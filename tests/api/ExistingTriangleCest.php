<?php

class TestingAtriangleForExistenceCest
{
    //1.Тестирование ввода числа 0 как значения для сторон треугольника ABC
    public function ID_1_Testing_input_of_NOT_natural_numbers_for_sides_of_triangle_ABC(ApiTester $I)
    {
        $data = [
            'a' => 0,
            'b' => 0,
            'c' => 0
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":"Not valid date"}');
    }

    //2.Тестирование ввода числа 0 как значения для стороны А треугольника ABC
    public function ID_2_Testing_NOT_natural_number_input_for_side_A_of_triangle_AB(ApiTester $I)
    {
        $data = [
            'a' => 0,
            'b' => 5,
            'c' => 1
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":"Not valid date"}');
    }

    //3.Тестирование ввода числа 0 как значения для стороны B треугольника ABC
    public function ID_3_Testing_NOT_natural_number_input_for_side_B_of_triangle_AB(ApiTester $I)
    {
        $data = [
            'a' => 6,
            'b' => 0,
            'c' => 2
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":"Not valid date"}');
    }

    //4.Тестирование ввода числа 0 как значения для стороны C треугольника ABC
    public function ID_4_Testing_NOT_natural_number_input_for_side_C_of_triangle_AB(ApiTester $I)
    {
        $data = [
            'a' => 2,
            'b' => 6,
            'c' => 0
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":"Not valid date"}');
    }

    //5.Проверка существования равнобедренного треугольника ABC
    public function ID_5_Data_processing_testing_for_isosceles_triangle_AB(ApiTester $I)
    {
        $data = [
            'a' => 5,
            'b' => 2,
            'c' => 5
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"isPossible":true}');
    }

    //6.Проверка существования равностороннего треугольника ABC
    public function ID_6_Data_processing_check_for_equilateral_triangle_AB(ApiTester $I)
    {
        $data = [
            'a' => 5,
            'b' => 5,
            'c' => 5
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"isPossible":true}');
    }

    //7.Проверка существования прямоугольного треугольника треугольника ABC
    public function ID_7_Data_processing_check_for_right_angled_triangle_AB(ApiTester $I)
    {
        $data = [
            'a' => 4,
            'b' => 5,
            'c' => 3
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"isPossible":true}');
    }

    //8.Тестирование существования треугольника ABC с текстовыми значениями для сторон ABC
    public function ID_8_Testing_text_input_for_triangle_AB(ApiTester $I)
    {
        $data = [
            'a' => 'a',
            'b' => 'b',
            'c' => 'c'
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":"Not valid date"}');
    }

    //9.Тестирование существования треугольника ABC с текстовым значением для стороны А
    public function ID_9_Testing_text_input_for_side_A_of_triangle_AB(ApiTester $I)
    {
        $data = [
            'a' => 'a',
            'b' => 2,
            'c' => 3
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":"Not valid date"}');
    }

    //10.Тестирование существования треугольника ABC  с текстовым значением для стороны B
    public function ID_10_Testing_text_input_for_side_B_of_triangle_ABC(ApiTester $I)
    {
        $data = [
            'a' => 25,
            'b' => 'b',
            'c' => 3
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":"Not valid date"}');
    }

    //11.Тестирование существования треугольника ABC  с текстовым значением для стороны C
    public function ID_11_Testing_text_input_for_side_C_of_triangle_ABC(ApiTester $I)
    {
        $data = [
            'a' => 25,
            'b' => 62,
            'c' => 'b'
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":"Not valid date"}');
    }

    //12.Тестирование существования треугольника ABC с заданными значениями
    public function ID_12_Testing_the_application_for_the_non_existence_of_a_triangle_with_the_given_parameters(ApiTester $I)
    {
        $data = [
            'a' => 6,
            'b' => 18,
            'c' => 11
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"isPossible":false}');
    }

    //13.Проверка на существования треугольника ABC с десятичными значениями сторон
    public function ID_13_Testing_decimal_input_for_triangle_ABC(ApiTester $I)
    {
        $data = [
            'a' => 2.5,
            'b' => 621.2,
            'c' => 5.2
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":"Not valid date"}');
    }

    //14.Проверка на существования треугольника ABC с десятичным значением стороны A
    public function ID_14_Check_for_the_existence_of_a_triangle_ABC_with_side_A_the_value_of_which_is_a_decimal_fraction(ApiTester $I)
    {
        $data = [
            'a' => 2.5,
            'b' => 12,
            'c' => 15
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":"Not valid date"}');
    }

    //15.Проверка на существования треугольника ABC с десятичным значением стороны B
    public function ID_15_Check_for_the_existence_of_a_triangle_ABC_with_side_B_the_value_of_which_is_a_decimal_fraction(ApiTester $I)
    {
        $data = [
            'a' => 612,
            'b' => 151.2,
            'c' => 421
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":"Not valid date"}');
    }

    //16.Проверка на существования треугольника ABC с десятичным значением стороны C
    public function ID_16_Check_for_the_existence_of_a_triangle_ABC_with_side_C_the_value_of_which_is_a_decimal_fraction(ApiTester $I)
    {
        $data = [
            'a' => 1,
            'b' => 5,
            'c' => 4.21
        ];
        $I->haveHttpHeader('Content-Type', 'application/json');
        $I->sendGet('/triangle/possible', $data);
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"error":"Not valid date"}');
    }
}
