<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
    

    @if($role_id == 1)
    <li class="active">
        <a href="" id="admindashboard"><i class="icon-chevron-right"></i> Dashboard</a>
    </li>
    <li>
        <a href="" id="adminstudents"><i class="icon-chevron-right"></i>Students</a>
    </li>
    <li>
        <a href="" id="adminquestions"><i class="icon-chevron-right"></i>Questions</a>
    </li>
    @else
    <li class="active">
        <a href="" id="userdashboard"><i class="icon-chevron-right"></i> Dashboard</a>
    </li>
    <li>
        <a href="" id="training"><i class="icon-chevron-right"></i>Training</a>
    </li>
    <li>
        <a href="" id="exam"><i class="icon-chevron-right"></i>Exam</a>
    </li>
    <li>
        <a href="" id="reports"><i class="icon-chevron-right"></i>Reports</a>
    </li>
    @endif
</ul>