<?php
    namespace App\Http\Repositories;

use App\Models\Faqs;
use App\Models\DoctorQuestions;
use App\Models\DoctorQuestionOptions;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

    class QuestionsOptionsRepository extends BaseRepository {

        /**
         * Specify Model class name
         *
         * @return string
         */
        public function model()
        {
            return DoctorQuestionOptions::class;
        }
        /**
         * Boot up the repository, pushing criteria
         */
        public function boot()
        {
            $this->pushCriteria(app(RequestCriteria::class));
        }
    }