<?php

namespace App\Repositories\Interfaces;

interface SurveyInterface
{
    public function getSurvey();
    public function getSurveyById(int $id);
    public function createSurvey($request);
    public function updateSurvey(int $id, $request);
    public function deleteSurvey(int $id);
}
