<?php

namespace App\Http\Controllers;

use App\Http\Requests\BmiRequest;
use App\Models\Feature;
use Illuminate\Http\Request;
use App\Http\Resources\FeatureResource;
use App\Models\UsedFeature;

class BmiCalculatorController extends Controller
{
    public ?Feature $feature = null;

    public function __construct()
    {
        $this->feature = Feature::where("route_name","bmi.index")
        ->where('active',true)
        ->firstOrFail();
    }

    public function index(Request $request)
    {
        return inertia('BMI/Index',['feature' => new FeatureResource($this->feature), 'answer' => session('answer')]);
    }

    public function calculate(BmiRequest $request)
    {
        $user = auth()->user();
        if ($user->available_credits < $this->feature->required_credits) {

            return back();
        }
        $valid = $request->validated();

        //calculation
        $bmi = (float)$valid['weight'] / ((float)$valid['height'] * (float)$valid['height']);

        $user->decreaseCredits($this->feature->required_credits);

        UsedFeature::create([
            'feature_id' => $this->feature->id,
            'user_id' => $user->id,
            'credits' => $this->feature->required_credits,
            'data' => $valid
        ]);

        return to_route('bmi.index')->with('answer', $bmi);

    }
}
