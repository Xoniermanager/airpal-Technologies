<?php


    namespace App\Http\Repositories;
    use Prettus\Repository\Eloquent\BaseRepository;
    use Prettus\Repository\Criteria\RequestCriteria;
    use App\Models\DoctorAppointmentConfig;

    class DoctorSlotRepository extends BaseRepository {

        /**
         * Specify Model class name
         *
         * @return string
         */
        public function model()
        {
            return DoctorAppointmentConfig::class;
        }
        /**
         * Boot up the repository, pushing criteria
         */
        public function boot()
        {
            $this->pushCriteria(app(RequestCriteria::class));
        }
    }