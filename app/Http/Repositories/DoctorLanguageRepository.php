<?php
    namespace App\Http\Repositories;
    use App\Models\Specialization;
    use Prettus\Repository\Eloquent\BaseRepository;
    use Prettus\Repository\Criteria\RequestCriteria;
    use App\Models\DoctorLanguage;

    class DoctorLanguageRepository extends BaseRepository {

        /**
         * Specify Model class name
         *
         * @return string
         */
        public function model()
        {
            return DoctorLanguage::class;
        }
        /**
         * Boot up the repository, pushing criteria
         */
        public function boot()
        {
            $this->pushCriteria(app(RequestCriteria::class));
        }
    }

?>