<?php
    namespace App\Http\Repositories;

    use App\Models\UserAddress;
    use Prettus\Repository\Eloquent\BaseRepository;
    use Prettus\Repository\Criteria\RequestCriteria;

    class DoctorAddressRepository extends BaseRepository {

        /**
         * Specify Model class name
         *
         * @return string
         */
        public function model()
        {
            return UserAddress::class;
        }
        /**
         * Boot up the repository, pushing criteria
         */
        public function boot()
        {
            $this->pushCriteria(app(RequestCriteria::class));
        }
    }
