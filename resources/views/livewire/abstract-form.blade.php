@php
    $topics = [
        'Engineering' => [
            'sustainable_engineering' => 'Sustainable Engineering',
            'socio_engineering' => 'Socio-Engineering',
            'technopreneurship' => 'Technopreneurship',
            'renewable_energy' => 'Renewable Energy',
            'advanced_material' => 'Advanced Material',
        ],
        'Science & Technology' => [
            'climate_change' => 'Climate Change',
            'big_data_analytics' => 'Big Data and Analytics',
            'food_science_technology' => 'Food Science and Technology',
            'bio_technology' => 'Bio Technology',
            'ethnobiology' => 'Ethnobiology',
            'green_chemistry' => 'Green Chemistry',
            'bio_medic_technology' => 'Bio Medic Technology',
            'biodiversity' => 'Biodiversity',
            'earth_science' => 'Earth Science',
        ],
        'Edu Technology' => [
            'digital_transformation_education' => 'Digital Transformation in Education',
            'stem_education' => 'STEM (Science, Technology, Engineering, and Mathematics) Education',
        ],
    ];
    
    function getTopicLabel($topicValue, $topics) {
        foreach ($topics as $category => $options) {
            if (array_key_exists($topicValue, $options)) {
                return $options[$topicValue]; // Return the label
            }
        }
        return null; // Return null if not found
    }
@endphp


<div>
    @if ($add == true)
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Add Abstract</h2>
                </div>
            </div>
        </div>
        <a class="btn btn-warning my-3" wire:click='cancel()'>Back</a>
        <form wire:submit.prevent="save">
            <div class="form-group">
                <label for="topic">
                    Topic
                </label>
                <select class="custom-select @error('topic') is-invalid @enderror" id="topic" name="topic"
                    wire:model='topic'>
                    <option value="">Choose One</option>
                
                    <!-- Engineering -->
                    <optgroup label="Engineering">
                        <option value="sustainable_engineering">Sustainable Engineering</option>
                        <option value="socio_engineering">Socio-Engineering</option>
                        <option value="technopreneurship">Technopreneurship</option>
                        <option value="renewable_energy">Renewable Energy</option>
                        <option value="advanced_material">Advanced Material</option>
                    </optgroup>
                
                    <!-- Science & Technology -->
                    <optgroup label="Science & Technology">
                        <option value="climate_change">Climate Change</option>
                        <option value="big_data_analytics">Big Data and Analytics</option>
                        <option value="food_science_technology">Food Science and Technology</option>
                        <option value="bio_technology">Bio Technology</option>
                        <option value="ethnobiology">Ethnobiology</option>
                        <option value="green_chemistry">Green Chemistry</option>
                        <option value="bio_medic_technology">Bio Medic Technology</option>
                        <option value="biodiversity">Biodiversity</option>
                        <option value="earth_science">Earth Science</option>
                    </optgroup>
                
                    <!-- Edu Technology -->
                    <optgroup label="Edu Technology">
                        <option value="digital_transformation_education">Digital Transformation in Education</option>
                        <option value="stem_education">STEM (Science, Technology, Engineering, and Mathematics) Education</option>
                    </optgroup>
                    
                    <!--
                    <option value="organic and bio chemistry">Organic and Bio Chemistry</option>
                    <option value="analytical and environmental chemistry">Analytical and Environmental Chemistry</option>
                    <option value="inorganic and material chemistry">Inorganic and Material Chemistry</option>
                    <option value="physical and computation chemistry">Physical and Computation Chemistry</option>
                    <option value="chemical education">Chemical Education</option>
                    -->
                </select>
                @error('topic')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">
                    Type
                </label>
                <select class="custom-select @error('type') is-invalid @enderror" id="type" name="type"
                    wire:model='type'>
                    <option value="">Choose One</option>
                    <option value="oral presentation">Oral Presentation</option>
                </select>
                @error('type')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="Title" name="title" wire:model='title'>
                @error('title')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="authors">All Authors</label>
                <textarea class="form-control @error('authors') is-invalid @enderror" id="authors" rows="3"
                    placeholder="All Authors" name="authors" wire:model='authors'></textarea>
                @error('authors')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="institutions">Institutions</label>
                <textarea class="form-control @error('institutions') is-invalid @enderror" id="institutions" rows="3"
                    placeholder="Institutions" name="institutions" wire:model='institutions'></textarea>
                @error('institutions')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="abstract">Content of Abstract</label>
                <textarea class="form-control @error('abstract') is-invalid @enderror" id="abstract" rows="3"
                    placeholder="Content of abstract" name="abstract" wire:model='abstract'></textarea>
                @error('abstract')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="keywords">Keywords</label>
                <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywords"
                    placeholder="Keywords" name="keywords" wire:model='keywords'>
                @error('keywords')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="presenter">Presenter</label>
                <input type="text" class="form-control @error('presenter') is-invalid @enderror" id="presenter"
                    aria-describedby="emailHelp" placeholder="Presenter" name="presenter" wire:model='presenter'>
                @error('presenter')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning" wire:click='cancel()'>Cancel</a>
        </form>
    @elseif ($edit == true)
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Edit Abstract</h2>
                </div>
            </div>
        </div>
        <a class="btn btn-warning my-3" wire:click='cancel()'>Back</a>
        <form wire:submit.prevent="update">
            <div class="form-group">
                <label for="topic">
                    Topic
                </label>
                <select class="custom-select @error('topic') is-invalid @enderror" id="topic" name="topic"
                    wire:model='topic'>
                    <option value="">Choose One</option>
                     @foreach($topics as $category => $options)
                        <optgroup label="{{ $category }}">
                            @foreach($options as $value => $label)
                                <option value="{{ $value }}" @if ($topic == $value) selected @endif>{{ $label }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                @error('topic')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">
                    Type
                </label>
                <select class="custom-select @error('type') is-invalid @enderror" id="type" name="type"
                    wire:model='type'>
                    <option value="">Choose One</option>
                    <option value="oral presentation">Oral Presentation</option>
                </select>
                @error('type')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="Title" name="title" wire:model='title'>
                @error('title')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="authors">All Authors</label>
                <textarea class="form-control @error('authors') is-invalid @enderror" id="authors" rows="3"
                    placeholder="All Authors" name="authors" wire:model='authors'></textarea>
                @error('authors')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="institutions">Institutions</label>
                <textarea class="form-control @error('institutions') is-invalid @enderror" id="institutions" rows="3"
                    placeholder="Institutions" name="institutions" wire:model='institutions'></textarea>
                @error('institutions')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="abstract">Content of Abstract</label>
                <textarea class="form-control @error('abstract') is-invalid @enderror" id="abstract" rows="3"
                    placeholder="Content of abstract" name="abstract" wire:model='abstract'></textarea>
                @error('abstract')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="keywords">Keywords</label>
                <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywords"
                    placeholder="Keywords" name="keywords" wire:model='keywords'>
                @error('keywords')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="presenter">Presenter</label>
                <input type="text" class="form-control @error('presenter') is-invalid @enderror" id="presenter"
                    aria-describedby="emailHelp" placeholder="Presenter" name="presenter" wire:model='presenter'>
                @error('presenter')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-warning" wire:click='cancel()'>Cancel</a>
        </form>
    @else
        <!-- Information Box -->
        <div class="alert alert-info" style="background: linear-gradient(135deg, #e0f2fe 0%, #bae6fd 100%); border-left: 5px solid #0284c7; border-radius: 10px; box-shadow: 0 2px 8px rgba(2, 132, 199, 0.15);">
            <div style="display: flex; align-items: start; gap: 15px;">
                <div style="flex-shrink: 0;">
                    <i class="fa fa-info-circle" style="font-size: 28px; color: #0284c7;"></i>
                </div>
                <div style="flex: 1;">
                    <h5 style="color: #075985; font-weight: 700; margin-bottom: 10px; margin-top: 0;">
                        <i class="fa fa-edit"></i> Abstract Editing Information
                    </h5>
                    <p style="color: #0c4a6e; margin-bottom: 8px; line-height: 1.6;">
                        You can <strong>update and edit your abstract information</strong> at any time before the presentation session.
                        Simply click the <span style="background: #0284c7; color: white; padding: 2px 8px; border-radius: 4px; font-size: 12px;">Edit</span> button to modify your submission.
                    </p>
                    <p style="color: #0c4a6e; margin: 0; line-height: 1.6;">
                        <i class="fa fa-check-circle" style="color: #10b981;"></i>
                        <strong>Editable fields:</strong> Title, Authors, Institutions, Abstract Content, Keywords, and Presenter
                    </p>
                </div>
            </div>
        </div>

        <button class="btn btn-primary" wire:click="add()">Add Abstract {{$canEdit}}</button>

        @if (count($abstracts) !== 0)
            <div class="" style="overflow-x:auto;">
                <table class="table my-3">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Status</th>
                            <th>LOA</th>
                            <th>Invoice</th>
                            <th>Topic</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $a = 0;
                        @endphp
                        @foreach ($abstracts as $item)
                            <tr>
                                <th scope="row">{{ ++$a }}</th>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    @if ($item->loa)
                                        <a href="{{ asset('storage/' . $item->loa) }}" target="_blank"
                                            style="color:red; font-size:20px"><i class="fa fa-file-pdf-o"
                                                aria-hidden="true"></i></a>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->invoice)
                                        <a href="{{ asset('storage/' . $item->invoice) }}" target="_blank"
                                            style="color:red; font-size:20px"><i class="fa fa-file-pdf-o"
                                                aria-hidden="true"></i>
                                        </a>
                                    @endif
                                </td>
                                
                                <td>
                                    {{ getTopicLabel($item->topic, $topics) ?? 'Unknown Topic' }}
                                </td>

                                <td>
                                        <button class="btn btn-info"
                                            wire:click='editAbstract({{ $item->id }})'>edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endif
</div>

@section('script')
<script>
    // Sweet Alert for abstract success
    window.addEventListener('abstract-success', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.message,
            icon: event.detail.icon,
            confirmButtonText: 'Great!',
            confirmButtonColor: '#10b981',
            timer: 5000,
            showConfirmButton: true
        });
    });

    // Sweet Alert for abstract error
    window.addEventListener('abstract-error', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.message,
            icon: event.detail.icon,
            confirmButtonText: 'OK',
            confirmButtonColor: '#ef4444',
            showConfirmButton: true
        });
    });
</script>
@endsection
