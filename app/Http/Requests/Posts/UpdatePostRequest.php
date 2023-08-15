<?php

namespace App\Http\Requests\Posts;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = $this->user();
        // BUG On Updating records as an Admin, it binds the admin user_id instead of the user who creates the post.


        // $postUserId = $this->post->user_id;

        // if ($user->is_admin) {
        //     $postUserId = $user->id;
        // }

        // dd($user->id);

        $user = array_merge($this->all(), ['user_id' => $user->id]);


        return true;
    }

    // public function validationData()
    // {
    //     // BUG
    //     // In case of updating records as an admin, it updates the users' id with admin's one!!
    //     // dd(auth()->id());

    //     $post = $this->post->id;
    //     $user = $this->user()->id;

    //     // if ($user === $user->is_admin) {
    //     //     $user_id = $post->user_id;
    //     // }

    //     // dd($this->post->id);

    //     // $user = array_merge($this->all(), ['user_id' => $this->user()->id]);

    //     return $user;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => [
                'required',
            ],
            'user_id' => [
                'required',
                'exists:users,id'
            ],
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'bail',
            ],
            'slug' => [
                'required',
                'unique:posts,slug,' . $this->post->id,
                'string',
                'min:3',
                'max:255',
                'bail',
            ],
            'body' => [
                'required',
                'string',
                'min:30',
                'bail',
            ],
        ];
    }
}