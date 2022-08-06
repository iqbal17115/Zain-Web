
<div>
    <x-slot name="title">
        Fee
    </x-slot>

    <div class="row">
        <!-- Start Input -->

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <form wire:submit.prevent="SaveFee">
                   <div class="row">
                    <!-- Start Card Header -->
                       <div class="col-md-12">
                           <h2 class="font-weight-bold page-header">Fee</h2>
                           <hr>
                       </div>
                    <!-- End Card Header -->

                    <!-- Start Content -->
                   
                    <!-- Start Fee Info -->

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
                            @error('medium_id') <span class="error">{{ $message }}</span> @enderror
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
                            @error('group_id') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        @endif

                        <div class="col-md-3">
                        <div class="form-group">
                             <label class="text-lg font-weight-bold" for="fee">Fee<span id="required">*</span></label>
                             <input type="number" wire:model.lazy="fee" class="form-control" placeholder="Amount"/>
                             @error('fee') <span class="error">{{ $message }}</span> @enderror
                        </div>
                        </div>
                       <!-- End Fee Info -->

                       <!-- Start Button Info -->
                        <div class="col-md-12">
                            <button class="btn btn-danger btn-lg float-right">Save</button> 
                        </div>
                        <!-- End End Info -->
                    <!-- End Content -->
                   </div>
                   </form>

                </div>
            </div>
        </div>

        <!-- End Input -->

        <!-- Start List -->
         <div class="col-md-12">
         <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                   <h2 class="font-weight-bold page-header">Fee List</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <!-- <div class="text-sm-right">
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" wire:click="DepartmentModal"><i class="mdi mdi-plus mr-1"></i> Group</button>
                            </div> -->
                        </div><!-- end col-->
                    </div>
                    <div wire:ignore class="table-responsive">
                        <div wire:ignore class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="FeeTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                        </div>
                    </div>
                </div>
            </div>
         </div>
        <!-- End List -->

    </div>

</div>
@push('scripts')
<script>
    function callEdit(id) {
        @this.call('FeeEdit', id);
    }
    function callDelete(id) {
        @this.call('FeeDelete', id);
    }

    $(document).ready(function () {

        var datatable = $('#FeeTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('data.fee_table')}}",
            columns: [
                {
                    title: 'SL',
                    data: 'id'
                },
                {
                    title: 'Class',
                    data: 'class_name_id',
                    name:'class_name_id'
                },
                {
                    title: 'Medium',
                    data: 'medium',
                    name:'medium'
                },
                {
                    title: 'Group',
                    data: 'group',
                    name:'group'
                },
                {
                    title: 'Fee',
                    data: 'fee',
                    name:'fee'
                },
                {
                    title: 'Status',
                    data: 'status',
                    name:'status'
                },
                {
                    title: 'Action',
                    data: 'action',
                    name:'action'
                },
            ]
        });

        window.livewire.on('success', message => {
            datatable.draw(true);
        });
    });
</script>
@endpush



