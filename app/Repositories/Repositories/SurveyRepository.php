<?php

namespace App\Repositories\Repositories;

use App\Models\SurveyRequest;
use App\Repositories\Interfaces\SurveyInterface;

class SurveyRepository implements SurveyInterface
{
    public function getSurvey()
    {
        return SurveyRequest::all();
    }

    public function getSurveyById(int $id)
    {
        return SurveyRequest::find($id);
    }

    public function createSurvey($request)
    {
        $surveyRequest = new SurveyRequest();
        $surveyRequest->full_name = $request->full_name;
        $surveyRequest->mobile = $request->mobile;
        $surveyRequest->email = $request->email;
        $surveyRequest->pincode = $request->pincode;
        $surveyRequest->city = $request->city;
        return $surveyRequest->save();
    }

    public function updateSurvey(int $id, $request)
    {
        $survey = SurveyRequest::findOrFail($id);
        $survey->update($request);

        return $survey;
    }

    public function deleteSurvey(int $id)
    {
        $survey = SurveyRequest::findOrFail($id);
        return $survey->delete();
    }
}

