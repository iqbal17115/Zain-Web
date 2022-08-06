
<div>
    <x-slot name="title">
        Group
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                   <h2 class="font-weight-bold page-header">Department</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" wire:click="DepartmentModal"><i class="mdi mdi-plus mr-1"></i> Group</button>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div wire:ignore class="table-responsive">
                        <div wire:ignore class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="GroupTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                <!--  Start Modal -->
                <div wire:ignore.self class="modal fade" id="DepartmentModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Group Name</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form wire:submit.prevent="GroupSave">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-firstname-input">Code</label>
                                                <input class="form-control" type="text" wire:model.lazy="code" placeholder="Item Code">
                                                 @error('code') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-lastname-input">Name</label>
                                                <input class="form-control" type="text" wire:model.lazy="name" placeholder="Enter Item Name">
                                                 @error('name') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-lastname-input">Class</label>
                                                <select class="form-control" wire:model.lazy="class_name_id">
                                                    <option value="">-- Select --</option>
                                                    @foreach($classes as $class_name)
                                                      <option value="{{ $class_name->id }}">{{ $class_name->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('class_name_id') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-lastname-input">Status</label>
                                                <select class="form-control" wire:model.lazy="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                                @error('status') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" >Submit</button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- End Modal -->
</div>
@push('scripts')
<script>
    function callEdit(id) {
        @this.call('GroupEdit', id);
    }
    function callDelete(id) {
        @this.call('GroupDelete', id);
    }

    $(document).ready(function () {

        var datatable = $('#GroupTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('data.group_table')}}",
            columns: [
                {
                    title: 'SL',
                    data: 'id'
                },
                {
                    title: 'Code',
                    data: 'code',
                    name:'code'
                },
                {
                    title: 'Class',
                    data: 'class_name_id',
                    name:'class_name_id'
                },
                {
                    title: 'Name',
                    data: 'name',
                    name:'name'
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
