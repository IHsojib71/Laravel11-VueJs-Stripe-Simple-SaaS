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
        $bmi =round((float)$valid['weight'] / ((float)$valid['height'] * (float)$valid['height']),2);

        if($bmi < 18.5){
            $bmi = $bmi . ' (Underweight)';
        } else if ($bmi >= 18.5 && $bmi <24.9) {
            $bmi = $bmi . ' (Normal weight)';
        }
        else if ($bmi >= 25 && $bmi <29.9) {
            $bmi = $bmi . ' (Overweight )';
        }
        else if ($bmi >= 30) {
            $bmi = $bmi . ' (Overweight )';
        }

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
