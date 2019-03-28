<div class="container-fluid bg-blue">
    <nav class="navbar navbar-expand-sm justify-content-between">
        <div class="row">
            <div class="col-12 pl-0 text-right">
                <a class="navbar-brand text-white mr-0 pb-0" href="#"><h1 class="font-weight-bold mb-0">BookIt</h1></a>
                <a href="#"><h5 class="text-orange font-weight-bold">Kent State</h5></a>
            </div>
        </div>
        <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarText">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-sm-auto">
                <li class="nav-item">
                    <a class="nav-link mx-1 head-link text-center" href="#"><h5 class="font-weight-bold">Home</h5></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-1 head-link text-center" href="#"><h5 class="font-weight-bold">List a Book</h5></a>
                </li>
                <li class="nav-item dropdown" id="loggedIn">
                    <a class="nav-link head-link mx-1 text-center" href id="navbardrop" data-toggle="dropdown">
                        <h5 class="font-weight-bold d-inline">zbrockwa </h5><i class="fas fa-xs fa" id="chev"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right bg-light">
                        <h6 class="font-weight-bold text-center"><a href="#">Account</a></h6>
                        <h6 class="font-weight-bold text-center"><a href="#">Sign out</a></h6>
                    </div>
                </li>
                <li class="nav-item dropdown" id="headerSearch">
                    <a class="nav-link head-link mx-1 text-center" href id="navbardrop" data-toggle="dropdown">
                        <i class="fas fa-search"></i>
                        <i class="fas fa-xs fa" id="chev"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right bg-light">
                        <form>
                            <div class="input-group p-3">
                                <input type="text" name="term" placeholder="Search" class="form-control">
                                <div class="input-group-append">
                                    <button type="submit" name="searchSubmit" class="btn btn-warning">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="input-group px-3 pb-3">
                                <select class="form-control">
                                    <option>ISBN</option>
                                    <option>Course No.</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>
