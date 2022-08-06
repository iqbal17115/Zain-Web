<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu" style="background-color: #000000;">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{url('/dashboard')}}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboards</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-eraser"></i>
                        <span>Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('Setting.person')}}">Person Entry</a></li>
                        <li><a href="{{route('Setting.file-entry')}}">File Entry</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bxs-eraser"></i>
                        <span>Manage File</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('Setting.manage-file')}}">Manage</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
