
            <tbody id="doctor-list">
                @foreach ($doctors as $doctor)
                <tr>
                    <td>
                        <h2 class="table-avatar">
                            <a href="{{ route('admin.profile.index', ['user' => $doctor->id]) }}" class="avatar avatar-sm me-2"><img
                                    class="avatar-img rounded-circle"
                                    src="{{ $doctor['image_url'] }}"
                                    alt=""
                                    onerror="this.src='{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}';" 
                                    >
                                </a>
                            <a href="{{ route('admin.profile.index', ['user' => $doctor->id]) }}">{{$doctor->first_name}} {{$doctor->last_name}}</a>
                        </h2>
                    </td>
                    <td>
                        @forelse ($doctor->specializations as $specializaion)
                        <span>{{$specializaion->name}},</span>
                        @empty
                        <span>No Specialization available</span>
                        @endforelse</td>
                    <?php
                        $createdAt =  $doctor->created_at;
                        $date = new DateTime($createdAt);
                        $formattedDate = $date->format('d M Y');
                    ?>
                    <td>{{$formattedDate}} <br></td>
                    <td>$3100.00</td>
                    <td>
                        <div class="status-toggle">
                            <input type="checkbox" id="{{$doctor->id}}" class="check" checked>
                            <label for="{{$doctor->id}}" class="checktoggle">checkbox</label>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('admin.edit-doctor', ['user' => $doctor->id]) }}"><button class="btn btn-secondary">Edit</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
      
        {{-- <div class="mt-3 d-flex justify-content-end">
            {{ $doctors->links() }}
        </div> --}}


