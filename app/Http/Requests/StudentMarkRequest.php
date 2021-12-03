<?php

namespace App\Http\Requests;

use App\Models\StudentMark;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Validator;

class StudentMarkRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        Validator::extend("already_exist", function (
            $attribute,
            $value,
            $parameters,
            $validator
        ) {
            $exist = StudentMark::where("student_id", $value)->where(
                "term",
                $this->term
            );
            if ($this->student_mark) {
                $exist = $exist->where("id", "!=", $this->student_mark->id);
            }
            $exist = $exist->first();
            if ($exist) {
                return false;
            }
            return true;
        });
        return [
            "student" =>"required|integer|exists:students,id|already_exist",
            "term" => "required",
            "maths" => "required|numeric",
            "science" => "required|numeric",
            "history" => "required|numeric",
        ];

    }

    public function messages()
    {
        return [
            "already_exist" => "The marks already added for this student",
        ];
    }
}
