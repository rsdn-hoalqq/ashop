
    <!-- Top fixed navigation -->
    <div class="topNav">
        <div class="wrapper">
            <div class="welcome"><a href="#" title=""><img style="width: 18px;height: 18px" src="{{$imgUrl}}/files/@if(Auth::check()){{ Auth::user()->images}}@endif" alt="" /></a>
                <span> @if(Auth::check())
                        {{ Auth::user()->fullname}}

                    @endif</span>
            </div>
            <div class="userNav">
                <ul>
                    <li><a href="#" title=""><img src="{{$adminUrl}}/images/icons/topnav/profile.png" alt="" /><span>Profile</span></a></li>
                    <li><a href="#" title=""><img src="{{$adminUrl}}/images/icons/topnav/tasks.png" alt="" /><span>Tasks</span></a></li>
                    <li class="dd"><a title=""><img src="{{$adminUrl}}/images/icons/topnav/messages.png" alt="" /><span>Messages</span><span class="numberTop">{{$count_all}}</span></a>
                        <ul class="userDropdown">
                            <li><a href="#" title="" class="sAdd">new message</a></li>
                            <li><a href="{{route('admin.contacts.contacts')}}" title="" class="sInbox">Inbox ({{$counts}}) </a> </li>
                            <li><a href="#" title="" class="sOutbox">outbox</a></li>
                            <li><a href="{{route('admin.contacts.bin')}}" title="" class="sTrash">trash ({{$count_bin}})</a></li>
                        </ul>
                    </li>
                    <li><a href="#" title=""><img src="{{$adminUrl}}/images/icons/topnav/settings.png" alt="" /><span>Settings</span></a></li>
                    <li><a href="{{route('auth.auth.logout')}}" title=""><img src="{{$adminUrl}}/images/icons/topnav/logout.png" alt="" /><span>Logout</span></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>

    <!-- Responsive header -->
    <div class="resp">
        <div class="respHead">
            <a href="index.html" title=""><img src="{{$adminUrl}}/images/loginLogo.png" alt="" /></a>
        </div>

        <div class="cLine"></div>
        <div class="smalldd">
            <span class="goTo"><img src="{{$adminUrl}}/images/icons/light/frames.png" alt="" />Dynamic table</span>
            <ul class="smallDropdown">
                <li><a href="index.html" title=""><img src="{{$adminUrl}}/images/icons/light/home.png" alt="" />Dashboard</a></li>
                <li><a href="charts.html" title=""><img src="{{$adminUrl}}/images/icons/light/stats.png" alt="" />Statistics and charts</a></li>
                <li><a href="#" title="" class="exp"><img src="{{$adminUrl}}/images/icons/light/pencil.png" alt="" />Forms stuff<strong>4</strong></a>
                    <ul>
                        <li><a href="forms.html" title="">Form elements</a></li>
                        <li><a href="form_validation.html" title="">Validation</a></li>
                        <li><a href="form_editor.html" title="">WYSIWYG and file uploader</a></li>
                        <li class="last"><a href="form_wizards.html" title="">Wizards</a></li>
                    </ul>
                </li>
                <li><a href="ui_elements.html" title=""><img src="{{$adminUrl}}/images/icons/light/users.png" alt="" />Interface elements</a></li>
                <li><a href="tables.html" title="" class="exp"><img src="{{$adminUrl}}/images/icons/light/frames.png" alt="" />Tables<strong>3</strong></a>
                    <ul>
                        <li><a href="table_static.html" title="">Static tables</a></li>
                        <li><a href="table_dynamic.html" title="">Dynamic table</a></li>
                        <li class="last"><a href="table_sortable_resizable.html" title="">Sortable &amp; resizable tables</a></li>
                    </ul>
                </li>
                <li><a href="#" title="" class="exp"><img src="{{$adminUrl}}/images/icons/light/fullscreen.png" alt="" />Widgets and grid<strong>2</strong></a>
                    <ul>
                        <li><a href="widgets.html" title="">Widgets</a></li>
                        <li class="last"><a href="grid.html" title="">Grid</a></li>
                    </ul>
                </li>
                <li><a href="#" title="" class="exp"><img src="{{$adminUrl}}/images/icons/light/alert.png" alt="" />Error pages<strong>6</strong></a>
                    <ul class="sub">
                        <li><a href="403.html" title="">403 page</a></li>
                        <li><a href="404.html" title="">404 page</a></li>
                        <li><a href="405.html" title="">405 page</a></li>
                        <li><a href="500.html" title="">500 page</a></li>
                        <li><a href="503.html" title="">503 page</a></li>
                        <li class="last"><a href="offline.html" title="">Website is offline</a></li>
                    </ul>
                </li>
                <li><a href="file_manager.html" title=""><img src="{{$adminUrl}}/images/icons/light/files.png" alt="" />File manager</a></li>
                <li><a href="#" title="" class="exp"><img src="{{$adminUrl}}/images/icons/light/create.png" alt="" />Other pages<strong>3</strong></a>
                    <ul>
                        <li><a href="typography.html" title="">Typography</a></li>
                        <li><a href="calendar.html" title="">Calendar</a></li>
                        <li class="last"><a href="gallery.html" title="">Gallery</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="cLine"></div>
    </div>