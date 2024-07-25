<?php
    namespace App\Http\Repositories;

use App\Models\FavoriteDoctor;
use Prettus\Repository\Eloquent\BaseRepository;
    use Prettus\Repository\Criteria\RequestCriteria;
    use App\Models\Service;

    class FavoriteDoctorRepository extends BaseRepository {

        /**
         * Specify Model class name
         *
         * @return string
         */
        public function model()
        {
            return FavoriteDoctor::class;
        }
    }

