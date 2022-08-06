
<div>
    <x-slot name="title">
        Medium
    </x-slot>

    <div class="row">
        
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form wire:submit.prevent="AdmissionConfirm">
                   <div class="row">
                    <!-- Start Card Header -->
                       <div class="col-md-12">
                           <h2 class="font-weight-bold page-header">Student Admission Form</h2>
                           <hr>
                       </div>
                    <!-- End Card Header -->

                    <!-- Start Content -->
                   
                    <!-- Start Student Info -->
                        <div class="col-md-12">
                        <h3 class="font-weight-bold ml-2">Student Information</h3>
                        <hr class="bottom-hr ml-2">
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                             <label class="text-lg font-weight-bold" for="first_name">First Name<span id="required">*</span></label>
                             <input type="text" class="form-control form-control-lg" id="first_name" wire:model.lazy="first_name" placeholder="First Name"/>
                            @error('first_name') <span class="error">{{ $message }}</span> @enderror
                           </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="text-lg font-weight-bold" for="last_name">Last Name<span id="required">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="last_name" wire:model.lazy="last_name" placeholder="Last Name"/>
                            @error('last_name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                        <label class="text-lg font-weight-bold" for="class">Class<span id="required">*</span></label>
                            <select class="form-control form-control-lg" id="class" wire:model.lazy="class_name_id">
                                <option value="">Please Select Class</option>
                                @foreach($classes as $class)
                                   <option value="{{ $class->id }}">{{ $class->name }}-{{ $class->year }}</option>
                                @endforeach
                            </select>
                            @error('class_name_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                        <label class="text-lg font-weight-bold" for="gender">Gender<span id="required">*</span></label>
                            <select class="form-control form-control-lg" id="gender" wire:model.lazy="gender">
                                <option value="">Gender</option>
                                   <option value="Male">Male</option>
                                   <option value="Female">Female</option>
                            </select>
                            @error('gender') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="text-lg font-weight-bold" for="dob">Date Of Birth<span id="required">*</span></label>
                            <input type="date" class="form-control form-control-lg" id="dob" wire:model.lazy="dob"/>
                            @error('dob') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="text-lg font-weight-bold" for="roll">Roll<span id="required">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="roll" wire:model.lazy="roll" placeholder="Roll"/>
                            @error('roll') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="text-lg font-weight-bold" for="admission_no">Admission No.</label>
                            <input type="text" class="form-control form-control-lg" id="admission_no" wire:model.lazy="admission_no" placeholder="Admission No."/>
                            @error('admission_no') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                        <label class="text-lg font-weight-bold" for="religion">Religion<span id="required">*</span></label>
                            <select class="form-control form-control-lg" id="religion" wire:model.lazy="religion">
                                <option value="">Religion</option>
                                   <option value="Islam">Islam</option>
                                   <option value="Hinduism">Hinduism</option>
                                   <option value="Buddhism">Buddhism</option>
                                   <option value="Christianity">Christianity</option>
                                   <option value="Other">Other</option>
                            </select>
                            @error('religion') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="text-lg font-weight-bold" for="email">Email</label>
                            <input type="text" class="form-control form-control-lg" id="email" wire:model.lazy="email" placeholder="Email"/>
                        </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="text-lg font-weight-bold" for="student_photo">Student Photo</label>
                            <input type="file" class="form-control form-control-lg" id="student_photo" wire:model.lazy="student_photo"/>
                        </div>
                        </div>

                        @if($SelectedClass && count($SelectedClass->Medium) > 0)
                        <div class="col-md-3">
                        <div class="form-group">
                        <label class="text-lg font-weight-bold" for="medium">Medium<span id="required">*</span></label>
                            <select class="form-control form-control-lg" id="medium" wire:model.lazy="medium_id">
                                <option value="" selected>Please Select Medium</option>
                                @foreach($SelectedClass->Medium as $medium)
                                   <option value="{{ $medium->id }}">{{ $medium->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        @endif

                        @if($SelectedClass && count($SelectedClass->Section) > 0)
                        <div class="col-md-3">
                        <div class="form-group">
                        <label class="text-lg font-weight-bold" for="section">Section<span id="required">*</span></label>
                            <select class="form-control form-control-lg" id="section" wire:model.lazy="section_id">
                                <option value="" selected>Please Select Section</option>
                                @foreach($SelectedClass->Section as $section)
                                   <option value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        @endif

                        @if($SelectedClass && count($SelectedClass->Group) > 0)
                        <div class="col-md-3">
                        <div class="form-group">
                        <label class="text-lg font-weight-bold" for="group">Group<span id="required">*</span></label>
                            <select class="form-control form-control-lg" id="group" wire:model.lazy="group_id">
                                <option value="" selected>Please Select Group</option>
                                @foreach($SelectedClass->Group as $group)
                                   <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        @endif
                       <!-- End Student Info -->

                       <!-- Start Parent Info -->
                        <div class="col-md-12 mt-2">
                        <h3 class="font-weight-bold ml-2">Parents Information</h3>
                        <hr class="bottom-hr ml-2">
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                             <label class="text-lg font-weight-bold" for="father_name">Father Name<span id="required">*</span></label>
                             <input type="text" class="form-control form-control-lg" id="father_name" wire:model.lazy="father_name" placeholder="Father Name"/>
                            @error('father_name') <span class="error">{{ $message }}</span> @enderror
                           </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                             <label class="text-lg font-weight-bold" for="mother_name">Mother Name<span id="required">*</span></label>
                             <input type="text" class="form-control form-control-lg" id="mother_name" wire:model.lazy="mother_name" placeholder="Mother Name"/>
                            @error('mother_name') <span class="error">{{ $message }}</span> @enderror
                           </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                             <label class="text-lg font-weight-bold" for="father_occupation">Father Occupation</label>
                             <input type="text" class="form-control form-control-lg" id="father_occupation" wire:model.lazy="father_occupation" placeholder="Father Occupation"/>
                           </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                             <label class="text-lg font-weight-bold" for="mother_occupation">Mother Occupation</label>
                             <input type="text" class="form-control form-control-lg" id="mother_occupation" wire:model.lazy="mother_occupation" placeholder="Mother Occupation"/>
                           </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                             <label class="text-lg font-weight-bold" for="phone">Phone</label>
                             <input type="text" class="form-control form-control-lg" id="phone" wire:model.lazy="phone" placeholder="Phone"/>
                           </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                        <label class="text-lg font-weight-bold" for="nationality">Nationality</label>
                            <select class="form-control form-control-lg" id="nationality" wire:model.lazy="nationality">
                                <option value="">Please Select Nationality</option>
                                @foreach($countries as $country)
                                   <option value="{{ $country->id }}" @if($country->nationality=="Bangladeshi") selected @endif>{{ $country->nationality }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                             <label class="text-lg font-weight-bold" for="present_address">Present Address</label>
                             <input type="text" class="form-control form-control-lg" id="present_address" wire:model.lazy="present_address" placeholder="Present Address"/>
                           </div>
                        </div>

                        <div class="col-md-3">
                           <div class="form-group">
                             <label class="text-lg font-weight-bold" for="permanent_address">Permanent Address</label>
                             <input type="text" class="form-control form-control-lg" id="permanent_address" wire:model.lazy="permanent_address" placeholder="Permanent Address"/>
                           </div>
                        </div>

                        <div class="col-md-3">
                        <div class="form-group">
                            <label class="text-lg font-weight-bold" for="parent_photo">Parents Photo</label>
                            <input type="file" class="form-control form-control-lg" id="parent_photo" wire:model.lazy="parent_photo"/>
                        </div>
                        </div>
                     
                        <div class="col-md-3">
                        <div class="form-group">
                        <label class="text-lg font-weight-bold" for="is_active">Status</label>
                            <select class="form-control form-control-lg" id="is_active" wire:model.lazy="status">
                                <option value="">Status</option>
                                   <option value="1">Active</option>
                                   <option value="0">Inactive</option>
                            </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button class="btn btn-danger btn-lg float-right">Save</button> 
                            <button class="btn btn-warning btn-lg float-right mx-2">Reset</button>
                        </div>
                        <!-- End Parent Info -->
                    <!-- End Content -->
                   </div>
                   </form>

                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')

        
@endpush

