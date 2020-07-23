<?php

use App\Models\BaseModel;
use App\Models\TypePerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Routes\Services\RouteService;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login')->name('auto-part.oauth.login');
    Route::post('login_adm', 'AuthController@loginAdm')->name('auto-part.oauth.login_adm');
    Route::post('register', 'AuthController@register')->name('auto-part.oauth.register');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('logout', 'AuthController@logout')->name('auto-part.oauth.logout');
    });
});

Route::group(['middleware' => 'auth:api'], function () {
    RouteService::createRoute('country', 'CountryController', BaseModel::getActions());
    RouteService::createRoute('state', 'StateController', BaseModel::getActions());
    RouteService::createRoute('examination_board', 'ExaminationBoardController', BaseModel::getActions());
    RouteService::createRoute('organ_scope', 'OrganScopeController', BaseModel::getActions());
    RouteService::createRoute('type_organ', 'TypeOrganController', BaseModel::getActions());
    RouteService::createRoute('organ', 'OrganController', BaseModel::getActions());
    RouteService::createRoute('status_public_tender_notice', 'StatusPublicTenderNoticeController', BaseModel::getActions());
    RouteService::createRoute('public_tender_notice', 'PublicTenderNoticeController', BaseModel::getActions());
    RouteService::createRoute('education_level', 'EducationLevelController', BaseModel::getActions());
    RouteService::createRoute('public_tender_notice_education_level', 'PublicTenderNoticeXEducationLevelController', BaseModel::getActions());
    RouteService::createRoute('public_tender_notice_state', 'PublicTenderNoticeXStateController', BaseModel::getActions());
    RouteService::createRoute('office', 'OfficeController', BaseModel::getActions());
    RouteService::createRoute('public_tender_notice_office', 'PublicTenderNoticeXOfficeController', BaseModel::getActions());
    RouteService::createRoute('category_content', 'CategoryContentController', BaseModel::getActions());
    RouteService::createRoute('content', 'ContentController', BaseModel::getActions());
    RouteService::createRoute('type_knowledge', 'TypeKnowledgeController', BaseModel::getActions());
    RouteService::createRoute('notice_content', 'NoticeContentController', BaseModel::getActions());
    RouteService::createRoute('notice_content_office', 'NoticeContentOfficeController', BaseModel::getActions());
    RouteService::createRoute('candidate', 'CandidateController', BaseModel::getActions());
    RouteService::createRoute('candidate_notice_content', 'CandidateNoticeContentController', BaseModel::getActions());
    RouteService::createRoute('my_public_tender_notice', 'MyPublicNoticeTenderController', BaseModel::getActions());
    RouteService::createRoute('my_content_public_notice', 'MyContentPublicNoticeController', BaseModel::getActions());
});




