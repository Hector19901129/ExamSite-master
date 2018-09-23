<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
    

    @if(!isset($role))
    <li class="active">
        <a href="/admin"><i class="icon-chevron-right"></i> Dashboard</a>
    </li>
    <li>
        <a href="/admin/students"><i class="icon-chevron-right"></i>Students</a>
    </li>
    <li>
        <a href="/admin/questions"><i class="icon-chevron-right"></i>Questions</a>
    </li>
    @else
    <li class="active">
        <a href="/admin"><i class="icon-chevron-right"></i> Dashboard</a>
    </li>
    <li>
        <a href="/admin/students"><i class="icon-chevron-right"></i>Students</a>
    </li>
    <li>
        <a href="/admin/questions"><i class="icon-chevron-right"></i>Questions</a>
    </li>



    <li class="active">
        <a href="/user"><i class="icon-chevron-right"></i> Dashboard</a>
    </li>
    <li>
        <a href="/training"><i class="icon-chevron-right"></i>Training</a>
    </li>
    <li>
        <a href="/exam"><i class="icon-chevron-right"></i>Exam</a>
    </li>
    <li>
        <a href="/reports"><i class="icon-chevron-right"></i>Reports</a>
    </li>
    @endif
</ul>