
<div>
    <x-slot name="title">
         Person
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                  <h2 class="font-weight-bold page-header">Person</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" wire:click="PersonModal"><i class="mdi mdi-plus mr-1"></i> Person</button>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div wire:ignore class="table-responsive">
                        <div wire:ignore class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="ClassTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                <!--  Start Modal -->
                <div wire:ignore.self class="modal fade" id="PersonModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myLargeModalLabel">Person</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form wire:submit.prevent="ClassNameSave">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-firstname-input">Code</label>
                                                <input class="form-control" type="text" wire:model.lazy="code" placeholder="Code">
                                                 @error('code') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-lastname-input">Name</label>
                                                <input class="form-control" type="text" wire:model.lazy="name" placeholder="Enter Name">
                                                 @error('name') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-lastname-input">Designation</label>
                                                <input class="form-control" type="text" wire:model.lazy="designation" placeholder="Enter Designation">
                                                 @error('designation') <span class="error">{{ $message }}</span> @enderror
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
        @this.call('PersonEdit', id);
    }
    function callDelete(id) {
        @this.call('PersonDelete', id);
    }

    $(document).ready(function () {

        var datatable = $('#ClassTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('data.person_table')}}",
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
                    title: 'Name',
                    data: 'name',
                    name:'name'
                },
                {
                    title: 'Designation',
                    data: 'designation',
                    name:'designation'
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

