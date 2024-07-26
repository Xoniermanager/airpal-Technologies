<?php
    namespace App\Http\Repositories;
    use App\Models\Specialization;
    use Prettus\Repository\Eloquent\BaseRepository;
    use Prettus\Repository\Criteria\RequestCriteria;
    use App\Models\DayOfWeek;

    class DayOfWeekRepository extends BaseRepository {

        /**
         * Specify Model class name
         *
         * @return string
         */
        public function model()
        {
            return DayOfWeek::class;
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