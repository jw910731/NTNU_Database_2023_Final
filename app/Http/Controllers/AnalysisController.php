<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalysisController extends Controller
{
    protected function ageToCategories()
    {
        $ageToCategoryList = array_fill(0, 12, array());
        for($i=0; $i<count($ageToCategoryList); $i++)
        {
            $ageToCategoryList[$i][] = "OAO";
            $ageToCategoryList[$i][] = "OAO";
            $ageToCategoryList[$i][] = "OAO";
        }
        return $ageToCategoryList;
    }

    public function index()
    {
        return view('admin.analysis', [
            'ageToCategoryList' => $this->ageToCategories()
        ]);
    }
}
