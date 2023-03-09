<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Resources\V1\SkillResource;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(Request $request)
    {
        return SkillResource::collection(Skill::all());
    }

    public function store(StoreSkillRequest $request)
    {
        Skill::create($request->validated());
        return response()->json('skill stored');
    }

    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }

    public function update(StoreSkillRequest $request, Skill $skill)
    {
        $skill->update($request->validated());
        return 'skill updated';
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return 'Skill deleted';
    }

    //////////////////////// Note:  //////////////////////
    // index method:
    /*
     * if we return Skill::all()-then user can see timestamp;
     * thats why i use: SkillResource::collection(Skill::all());
    */

    // Show method:
    /*     
     * route model binding-
     * Skill: that is a model
     * $skill: that will automatically find out data of an id which id sended from URL or Route
    */

    // udpate method:
    /*
    *  1. goto pustman-method will be put and save request,
    *  2. then goto body select .row paste it- {"name":"suhag", "slug":"suhag"}
    *  3. and select JSON into text
    */
}
