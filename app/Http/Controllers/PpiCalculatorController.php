<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\UsedFeature;
use Illuminate\Http\Request;
use App\Http\Requests\PpiRequest;
use App\Http\Resources\FeatureResource;

class PpiCalculatorController extends Controller
{
    public ?Feature $feature = null;

    public function __construct()
    {
        $this->feature = Feature::where("route_name","ppi.index")
        ->where('active',true)
        ->firstOrFail();
    }

    public function index(Request $request)
    {
        return inertia('PPI/Index',['feature' => new FeatureResource($this->feature), 'answer' => session('answer')]);
    }

    public function calculate(PpiRequest $request)
    {
        $user = auth()->user();
        if ($user->available_credits < $this->feature->required_credits) {
            return back();
        }
        $valid = $request->validated();

        //calculation
        $diagonal = sqrt(pow((float)$valid['width'],2) + pow((float)$valid['height'],2));
        $ppi = round((float) $diagonal / (float) $valid['diagonal'],2);

        $user->decreaseCredits($this->feature->required_credits);

        UsedFeature::create([
            'feature_id' => $this->feature->id,
            'user_id' => $user->id,
            'credits' => $this->feature->required_credits,
            'data' => $valid
        ]);

        return to_route('ppi.index')->with('answer', $ppi);

    }
}
