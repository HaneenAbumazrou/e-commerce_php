<?php
    $title = 'Add New Admins';
    $admins = 'active';

    // Retrieve previously submitted values for edit profile fields
    $firstName = $_SESSION['old_values']['first_name'] ?? $_SESSION['admin']['first_name'];
    $lastName = $_SESSION['old_values']['last_name'] ?? $_SESSION['admin']['last_name'];
    $username = $_SESSION['old_values']['username'] ?? $_SESSION['admin']['username'];
    $email = $_SESSION['old_values']['email'] ?? $_SESSION['admin']['email'];

    $passwordError = isset($errors['current_password']) || isset($errors['new_password']) || isset($errors['renew_password']) || isset($errors['empty_field']);
    $editProfileError = isset($_SESSION['errors']['first_name']) || isset($_SESSION['errors']['last_name']) || isset($_SESSION['errors']['username']) || isset($_SESSION['errors']['email']);

    ob_start();
?>

<div class="pagetitle">
    <h1>Profile</h1>
    
    <?php if (isset($_SESSION['success_message'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $_SESSION['success_message'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['success_message']); ?>
    <?php endif; ?>

    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item">Admin</li>
            <li class="breadcrumb-item active">Profile</li>
        </ol>
    </nav>
</div>

<section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="<?= ltrim($imagePath, "."); ?>" alt="Profile" class="rounded-circle">
                    <h2><?= $_SESSION["admin"]["username"] ?></h2>
                    <h3><?= $_SESSION["admin"]["role"] ?></h3>
                    <div class="social-links mt-2">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8">
            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                        <button class="nav-link <?= (!$editProfileError && !$passwordError) ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                        </li>
                        <li class="nav-item">
                        <button class="nav-link <?= $editProfileError ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                        </li>
                        
                        <li class="nav-item">
                        <button class="nav-link <?= $passwordError ? 'active' : '' ?>" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                        </li>
                    </ul>

                    <div class="tab-content pt-2">
                    <div class="tab-pane fade <?= (!$editProfileError && !$passwordError) ? 'show active' : '' ?> profile-overview" id="profile-overview">
                    <!-- Profile Details Content -->
                            <h5 class="card-title">Profile Details</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Full Name</div>
                                <div class="col-lg-9 col-md-8"><?= $_SESSION["admin"]["first_name"] . " " . $_SESSION["admin"]["last_name"] ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Username</div>
                                <div class="col-lg-9 col-md-8"><?= $_SESSION["admin"]["username"] ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Email</div>
                                <div class="col-lg-9 col-md-8"><?= $_SESSION["admin"]["email"] ?></div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Status</div>
                                <div class="col-lg-9 col-md-8">
                                    <?php if ($_SESSION["admin"]["status"] === 'active'): ?>
                                        <span class="badge text-bg-success">Active</span>
                                    <?php else: ?>
                                        <span class="badge text-bg-danger">Not Active</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade <?= $editProfileError ? 'show active' : '' ?> profile-edit pt-3" id="profile-edit">
                            <!-- Edit Profile Form -->
                            <form method="POST" action="/admin/admins/profile" enctype="multipart/form-data">
                                <div class="row mb-3">  
                                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="<?= ltrim($imagePath, "."); ?>" alt="Profile">
                                        <div class="pt-2">
                                        <input type="file" name="profile_image" accept="image/*" class="form-control" />
                                        <small class="text-muted">Upload a valid image file (jpg, png, gif).</small>
                                        <?php if (isset($_SESSION['errors']['profile_image'])): ?>
                                            <div class="text-danger"><?= $_SESSION['errors']['profile_image'] ?></div>
                                        <?php endif; ?>
                <!-- <button type="submit" name="update_profile" class="btn btn-primary btn-sm mt-2">Update Profile</button> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="first_name" type="text" class="form-control" id="fullName" value="<?= $_SESSION['old_values']['first_name'] ?? $_SESSION['admin']['first_name'] ?>">
                                        <?php if (isset($_SESSION['errors']['first_name'])): ?>
                                            <div class="text-danger"><?= $_SESSION['errors']['first_name'] ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="last_name" type="text" class="form-control" id="fullName" value="<?= $_SESSION['old_values']['last_name'] ?? $_SESSION['admin']['last_name'] ?>">
                                        <?php if (isset($_SESSION['errors']['last_name'])): ?>
                                            <div class="text-danger"><?= $_SESSION['errors']['last_name'] ?></div>
                                        <?php endif; ?>
                                      </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="username" type="text" class="form-control" id="Address" value="<?= $_SESSION['old_values']['username'] ?? $_SESSION['admin']['username'] ?>">
                                        <?php if (isset($_SESSION['errors']['username'])): ?>
                                            <div class="text-danger"><?= $_SESSION['errors']['username'] ?></div>
                                        <?php endif; ?>
                                      </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" type="text" class="form-control" id="Email" value="<?= $_SESSION['old_values']['email'] ?? $_SESSION['admin']['email'] ?>">
                                        <?php if (isset($_SESSION['errors']['email'])): ?>
                                            <div class="text-danger"><?= $_SESSION['errors']['email'] ?></div>
                                        <?php endif; ?>
                                      </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" name="update_profile" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                        <?php 
                        // Clear errors after displaying
                        unset($_SESSION['errors']);
                        if (isset($_SESSION['success_message'])): ?>
                            <div class="alert alert-success text-center"><?= $_SESSION['success_message']; unset($_SESSION['success_message']); ?></div>
                        <?php endif; ?>

                       

                        <div class="tab-pane fade <?= $passwordError ? 'show active' : '' ?> pt-3" id="profile-change-password">
                            <!-- Change Password Form -->
                            <form method="POST" action="/admin/admins/profile">
                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="current_password" type="password" class="form-control" id="currentPassword">
                                       
                                        <?php if(isset($errors['current_password'])): ?>
                                          <div class="text-danger"><?= $errors['current_password']; ?></div>
                                        <?php elseif(isset($errors['empty_field'])): ?>
                                          <div class="text-danger"><?= $errors['empty_field']; ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="new_password" type="password" class="form-control" id="newPassword">
                                        <?php if (isset($errors['new_password'])): ?>
                                            <div class="text-danger"><?= $errors['new_password']; ?></div>
                                        <?php elseif(isset($errors['empty_field'])): ?>
                                          <div class="text-danger"><?= $errors['empty_field']; ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="renew_password" type="password" class="form-control" id="renewPassword">
                                        <?php if (isset($errors['renew_password'])): ?>
                                            <div class="text-danger"><?= $errors['renew_password']; ?></div>
                                        <?php elseif(isset($errors['empty_field'])): ?>
                                          <div class="text-danger"><?= $errors['empty_field']; ?></div>
                                        <?php endif; ?>

                                    </div>
                                </div>
                                <div class="text-center">
                                    <button name="update_password" type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- End Bordered Tabs -->
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    $content = ob_get_clean();
    require "./views/pages/admin/layout.php";
    unset($_SESSION['errors'], $_SESSION['old_values']);

?>
