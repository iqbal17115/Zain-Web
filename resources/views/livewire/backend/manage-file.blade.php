
<div>
    <x-slot name="title">
      Manage File
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                  <h2 class="font-weight-bold page-header">Manage File</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" wire:click="ManageFileModal"><i class="mdi mdi-plus mr-1"></i> Manage File</button>
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
                <div wire:ignore.self class="modal fade" id="ManageFileModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myLargeModalLabel">File</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form wire:submit.prevent="ClassNameSave">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                        <div wire:ignore class="form-group">
                                                <label for="basicpill-lastname-input">Person</label>
                                                <select class="form-control" wire:model.lazy="person_id" id="select3-dropdown">
                                                    <option value="">-- Select --</option>
                                                    @foreach($persons as $person)
                                                      <option value="{{ $person->id }}">{{ $person->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('person_id') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                        <div wire:ignore class="form-group">
                                                <label for="basicpill-lastname-input">File</label>
                                                <select class="form-control" wire:model.lazy="file_entry_id" id="select2-dropdown">
                                                    <option value="">-- Select --</option>
                                                    @foreach($files as $file)
                                                      <option value="{{ $file->id }}">{{ $file->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('file_entry_id') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-lastname-input">Date</label>
                                                <input class="form-control" type="date" wire:model.lazy="date">
                                                 @error('date') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="basicpill-lastname-input">Note</label>
                                                <textarea class="form-control" wire:model.lazy="note" placeholder="Note"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                        <div class="form-group">
                                                <label for="basicpill-lastname-input">Status</label>
                                                <select class="form-control" wire:model.lazy="status">
                                                    <option value="">--Select--</option>
                                                    <option value="Received">Received</option>
                                                    <option value="Delivered">Delivered</option>
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
    $(document).ready(function () {
        $('#select2-dropdown').select2();
        $('#select2-dropdown').on('change', function (e) {
            var data = $('#select2-dropdown').select2("val");
            @this.set('file_entry_id', data);
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#select3-dropdown').select2();
        $('#select3-dropdown').on('change', function (e) {
            var data = $('#select3-dropdown').select2("val");
            @this.set('person_id', data);
        });
    });
</script>
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
            ajax: "{{route('data.manage_file_table')}}",
            columns: [
                {
                    title: 'SL',
                    data: 'id'
                },
                {
                    title: 'Person',
                    data: 'person_id',
                    name:'person_id'
                },
                {
                    title: 'File',
                    data: 'file_entry_id',
                    name:'file_entry_id'
                },
                {
                    title: 'Date',
                    data: 'date',
                    name:'date'
                },
                {
                    title: 'Status',
                    data: 'status',
                    name:'status'
                }, {
                    title: 'Date',
                    data: 'date',
                    name:'date'
                },
                {
                    title: 'Note',
                    data: 'note',
                    name:'note'
                },
                {
                    title: 'Active',
                    data: 'active_status',
                    name:'active_status'
                },
                {
                    title: 'Action',
                    data: 'action',
                    name:'action'
                }
            ]
        });

        window.livewire.on('success', message => {
            datatable.draw(true);
        });
    });
</script>
     
@endpush

