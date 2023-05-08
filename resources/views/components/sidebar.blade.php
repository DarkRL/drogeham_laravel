    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white mt-3">
        <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="{{ URL('/admin/dashboard') }}" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
                </a>
            </div>
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="{{ URL('/admin/home/index') }}" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Home</span>
                </a>
            </div>
            <div class="list-group list-group-flush mx-3 mt-4">
                <a href="{{ URL('/admin/history/index') }}" class="list-group-item list-group-item-action py-2 ripple active" aria-current="true">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>History</span>
                </a>
            </div>
        </div>
    </nav>
    <script>
        $(document).ready(function() {

            $('#sidebarCollapse').on('click', function() {
                $('#sidebarMenu').toggleClass('active');
            });

        });
    </script>