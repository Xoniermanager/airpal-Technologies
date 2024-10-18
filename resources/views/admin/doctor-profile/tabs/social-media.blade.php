<div class="tab-pane fade" id="social_media_details_tab">
<div class="container">

    @php
    $socialMediaAccounts = [
        ['name' => 'Facebook',  'icon' => 'facebook',  'account_type' => 1],
        ['name' => 'Twitter',   'icon' => 'twitter',   'account_type' => 2],
        ['name' => 'YouTube',   'icon' => 'youtube',   'account_type' => 3],
        ['name' => 'Instagram', 'icon' => 'instagram', 'account_type' => 4],
        ['name' => 'LinkedIn',  'icon' => 'linkedin',  'account_type' => 5],
        ['name' => 'Pinterest', 'icon' => 'pinterest', 'account_type' => 6],
    ];
    $userAccountCount = count($userSocialMediaAccounts);
    @endphp

    <form id="add_social_media_option" method="post" enctype="multipart/form-data"> 
    @csrf
    <div class="box-container">
        @foreach($socialMediaTypes as $key => $socialMediaName)
            <div class="box {{ strtolower($socialMediaName) }}">
                <i class="fab fa-{{ strtolower($socialMediaName) }}"></i>
                <h2>{{ $socialMediaName }}</h2>
                <input type="url" name="social[{{ $key }}][link]" 
                       placeholder="Enter {{ $socialMediaName }} URL" 
                       value="{{ $userSocialMediaAccounts[$key] ?? '' }}" 
                       />
                <input type="hidden" name="social[{{ $key }}][social_media_type_id]" 
                       value="{{ $key }}">
            </div>
        @endforeach
    </div>
        <input type="hidden" name="doctor_id" value="{{ $userId ?? '' }}">
        <button class="btn btn-primary mt-3">Save Changes</button>
    </form>
</div>
</div>
<style>
    h1 {
        margin-bottom: 20px;
    }

    .box-container {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .box {
        position: relative;
        padding: 40px 20px;
        background: white;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        color: white;
        text-align: center;
    }

    .box i {
        position: absolute;
        top: -30px;
        right: -30px;
        font-size: 120px;
        opacity: 0.1;
    }

    .box h2 {
        margin-bottom: 10px;
        color: white;
    }

    .box input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        color: #333;
    }

    .facebook {
        background-color: #3b5998;
    }

    .twitter {
        background-color: #1da1f2;
    }

    .instagram {
        background-color: #e4405f;
    }

    .linkedin {
        background-color: #0077b5;
    }

    .youtube {
        background-color: #ff0000;
    }

    .pinterest {
        background-color: #bd081c;
    }

    .box input {
        border: none;
        padding: 12px;
    }
    .whatsapp {
        background-color: #40e469;
    }
</style>
