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
        'Educational Technology' => [
            'digital_transformation_education' => 'Digital Transformation in Education',
            'stem_education' => 'STEM Education',
        ],
    ];
@endphp

<div class="abstract-workspace">
    @if ($add || $edit)
        <header class="abstract-heading">
            <p class="ed-eyebrow">Abstract submission</p>
            <h2>{{ $edit ? 'Edit abstract' : 'Submit an abstract' }}</h2>
            <p>{{ $edit ? 'Update the submission details before the review is completed.' : 'Complete each field below. You can return and edit the abstract after saving.' }}</p>
        </header>

        <form class="abstract-form" wire:submit.prevent="{{ $edit ? 'update' : 'save' }}">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="topic">Conference topic</label>
                        <select class="custom-select @error('topic') is-invalid @enderror" id="topic" name="topic" wire:model="topic">
                            <option value="">Choose a topic</option>
                            @foreach ($topics as $category => $options)
                                <optgroup label="{{ $category }}">
                                    @foreach ($options as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @error('topic')
                            <p class="participant-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="type">Presentation format</label>
                        <select class="custom-select @error('type') is-invalid @enderror" id="type" name="type" wire:model="type">
                            <option value="">Choose a format</option>
                            <option value="oral presentation">Oral Presentation</option>
                        </select>
                        @error('type')
                            <p class="participant-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="title">Abstract title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    placeholder="Enter the full paper title" name="title" wire:model="title">
                @error('title')
                    <p class="participant-error" role="alert">{{ $message }}</p>
                @enderror
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="authors">All authors</label>
                        <textarea class="form-control @error('authors') is-invalid @enderror" id="authors" rows="5"
                            placeholder="List every author in publication order" name="authors" wire:model="authors"></textarea>
                        @error('authors')
                            <p class="participant-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="institutions">Institutions</label>
                        <textarea class="form-control @error('institutions') is-invalid @enderror" id="institutions" rows="5"
                            placeholder="List each author affiliation" name="institutions" wire:model="institutions"></textarea>
                        @error('institutions')
                            <p class="participant-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="abstract">Abstract content</label>
                <textarea class="form-control @error('abstract') is-invalid @enderror" id="abstract" rows="9"
                    placeholder="Write the abstract in a single paragraph" name="abstract" wire:model="abstract"></textarea>
                @error('abstract')
                    <p class="participant-error" role="alert">{{ $message }}</p>
                @enderror
            </div>

            <div class="row">
                <div class="col-lg-7">
                    <div class="form-group">
                        <label for="keywords">Keywords</label>
                        <input type="text" class="form-control @error('keywords') is-invalid @enderror" id="keywords"
                            placeholder="Separate keywords with commas" name="keywords" wire:model="keywords">
                        @error('keywords')
                            <p class="participant-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="presenter">Presenting author</label>
                        <input type="text" class="form-control @error('presenter') is-invalid @enderror" id="presenter"
                            placeholder="Full name" name="presenter" wire:model="presenter">
                        @error('presenter')
                            <p class="participant-error" role="alert">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="abstract-actions">
                <button type="submit" class="btn btn-primary" wire:loading.attr="disabled" wire:target="save,update">
                    {{ $edit ? 'Save changes' : 'Submit Abstract' }}
                </button>
                <button type="button" class="btn btn-warning" wire:click="cancel">Back to submissions</button>
                <span class="participant-loading" wire:loading wire:target="save,update">Saving abstract...</span>
            </div>
        </form>
    @else
        <header class="abstract-heading">
            <p class="ed-eyebrow">Abstract submission</p>
            <h2>My abstract submissions</h2>
            <p>Submit a new abstract or continue editing an existing submission from this list.</p>
        </header>

        <div class="abstract-list-actions">
            <button type="button" class="btn btn-primary" wire:click="add">Submit Abstract</button>
            <span class="participant-loading" wire:loading wire:target="add">Opening form...</span>
        </div>

        @if (count($abstracts) === 0)
            <div class="abstract-empty">
                <p class="ed-mono">No submissions yet</p>
                <h3>Start with your abstract</h3>
                <p>Select “Submit Abstract” to open the form. Your saved submissions and review status will appear here.</p>
            </div>
        @else
            <div class="table-responsive abstract-table-wrap">
                <table class="table abstract-table">
                    <caption class="sr-only">Submitted abstracts</caption>
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Submission</th>
                            <th scope="col">Status</th>
                            <th scope="col">Documents</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($abstracts as $index => $item)
                            @php
                                $category = collect($topics)->firstWhere(fn ($options) => array_key_exists($item->topic, $options), []);
                                $topicLabel = $category[$item->topic] ?? 'Unknown topic';
                            @endphp
                            <tr wire:key="abstract-{{ $item->id }}">
                                <td>{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                                <td>
                                    <strong>{{ $item->title }}</strong>
                                    <span class="abstract-topic">{{ $topicLabel }}</span>
                                </td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <div class="document-links">
                                        @if ($item->loa)
                                            <a href="{{ asset('storage/' . $item->loa) }}" target="_blank" rel="noopener">View LOA</a>
                                        @else
                                            <span>Not issued</span>
                                        @endif
                                        @if ($item->invoice)
                                            <a href="{{ asset('storage/' . $item->invoice) }}" target="_blank" rel="noopener">View invoice</a>
                                        @else
                                            <span>Not issued</span>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning" wire:click="editAbstract({{ $item->id }})">Edit abstract</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    @endif
</div>

<script>
    window.addEventListener('abstract-success', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.message,
            icon: event.detail.icon,
            confirmButtonText: 'Close',
            confirmButtonColor: '#0b1b14',
            timer: 5000,
            showConfirmButton: true
        });
    });

    window.addEventListener('abstract-error', event => {
        Swal.fire({
            title: event.detail.title,
            text: event.detail.message,
            icon: event.detail.icon,
            confirmButtonText: 'Close',
            confirmButtonColor: '#b91c1c',
            showConfirmButton: true
        });
    });
</script>
