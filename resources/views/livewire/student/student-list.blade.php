
<div>
    <x-slot name="title">
        Student List
    </x-slot>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                  <h2 class="font-weight-bold page-header">Student List</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                <a href="{{ route('student.admission') }}" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2">Admission</a>
                            </div>
                        </div><!-- end col-->
                    </div>
                    <div wire:ignore class="table-responsive">
                        <div wire:ignore class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" id="SectionTable" style="border-collapse: collapse; border-spacing: 0; width: 100%;"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function callEdit(id) {
        @this.call('StudentEdit', id);
    }
    function callDelete(id) {
        @this.call('StudentDelete', id);
    }

    $(document).ready(function () {

        var datatable = $('#SectionTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{route('data.student_list_table')}}",
            columns: [
                {
                    title: 'SL',
                    data: 'id'
                },
                {
                    title: 'Name',
                    data: 'name',
                    name:'name'
                },
                {
                    title: 'DOB',
                    data: 'dob',
                    name:'dob'
                },
                {
                    title: 'Class',
                    data: 'class_name',
                    name:'class_name'
                },
                {
                    title: 'Year',
                    data: 'year',
                    name:'year'
                },
                {
                    title: 'Group',
                    data: 'group',
                    name:'group'
                },
                {
                    title: 'Medium',
                    data: 'medium',
                    name:'medium'
                },
                {
                    title: 'Section',
                    data: 'section',
                    name:'section'
                },
                {
                    title: 'Roll',
                    data: 'roll',
                    name:'roll'
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

