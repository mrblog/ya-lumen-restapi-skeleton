<?php


class CourseTest extends TestCase
{

    public function testCourseAuthFail() {
        $this->get('/v1/courses');
        $res = json_decode($this->response->getContent(), TRUE);
        $this->assertEquals(401, $this->response->getStatusCode());
        $this->assertFalse($res['success']);

    }
    public function testOneCourse() {
        $courses = json_decode(file_get_contents(__DIR__.'/../sample_data/courses.json'), TRUE);
        $this->get('/v1/course/3001', $this->testHeaders);
        $res = json_decode($this->response->getContent(), TRUE);
        $this->assertTrue($res['success']);
        $this->assertEquals($courses[3], $res['dataArray']['course']);
    }

    public function testAllCourses() {
        $courses = json_decode(file_get_contents(__DIR__.'/../sample_data/courses.json'), TRUE);
        $this->get('/v1/courses', $this->testHeaders);
        $res = json_decode($this->response->getContent(), TRUE);
        $this->assertTrue($res['success']);
        $this->assertEquals($courses, $res['dataArray']['courses']);
    }


    }
