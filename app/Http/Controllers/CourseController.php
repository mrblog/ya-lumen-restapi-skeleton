<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAllCourses(Request $request) {
        $courses = json_decode(file_get_contents(__DIR__.'/../../../sample_data/courses.json'), TRUE);
        $response = [
            'courses' => $courses
        ];
        error_log("getAllCourses params: ".var_export($request->request->all(), TRUE));
        error_log("getAllCourses version: ".$request->get('version'));
        return $this->generateSuccessResponse($response);
    }

    public function getOneCourse(Request $request, $courseId) {
        $courses = json_decode(file_get_contents(__DIR__.'/../../../sample_data/courses.json'), TRUE);
        $response = array();
        error_log("getOneCourse: ".$courseId);
        foreach ($courses as $course) {
            if ($course['CourseID'] === $courseId) {
                $response['course'] = $course;
                break;
            }
        }
        error_log("getOneCourse: result: ".var_export($response, TRUE));
        if (array_key_exists('course', $response)) {
            return $this->generateSuccessResponse($response);
        } else {
            return $this->generateErrorResponse("no such course");
        }
    }
}
