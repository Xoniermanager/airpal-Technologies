<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\HospitalsTableSeeder;
use Database\Seeders\SpecializationsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DaysSeeder::class,
        ]);
        $this->call(AwardsTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(DayOfWeeksTableSeeder::class);
        $this->call(HospitalsTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(SpecializationsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(DoctorAwardsTableSeeder::class);
        $this->call(UserAddressesTableSeeder::class);
        $this->call(DoctorEducationTableSeeder::class);
        $this->call(DoctorExperiencesTableSeeder::class);
        $this->call(DoctorLanguagesTableSeeder::class);
        $this->call(DoctorServicesTableSeeder::class);
        $this->call(DoctorSocialMediaAccountsTableSeeder::class);
        $this->call(DoctorSpecialitiesTableSeeder::class);
        $this->call(DoctorWorkingHoursTableSeeder::class);
        $this->call(DoctorAppointmentConfigsTableSeeder::class);
        $this->call(ExceptionDaysTableSeeder::class);
        $this->call(DoctorQuestionsTableSeeder::class);
        $this->call(QuestionOptionsTableSeeder::class);
        $this->call(BookingSlotsTableSeeder::class);
        $this->call(DoctorAppointmentQueriesTableSeeder::class);
        $this->call(DoctorReviewsTableSeeder::class);
        $this->call(FavoriteDoctorsTableSeeder::class);
        $this->call(FaqsTableSeeder::class);
        $this->call(PatientDiariesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(PageSectionsTableSeeder::class);
        $this->call(SectionContentsTableSeeder::class);
        $this->call(SectionButtonsTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);
        $this->call(PartnersTableSeeder::class);
        $this->call(SiteConfigsTableSeeder::class);

        $this->call(PageExtraSectionsTableSeeder::class);
        $this->call(SectionListsTableSeeder::class);
        $this->call(ListItemsTableSeeder::class);
    }
}
