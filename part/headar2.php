<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  header {
    background-image: linear-gradient(to right, #2FD69A, #33BE8F);
    width: 100%;
    height: 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
    position: sticky;
    top: 0;
    border-radius: 13px;
    z-index: 999;
  }

  .navbar-brand {
    font-weight: bold;
    font-size: 26px;
    font-family: sans-serif;
    color: black;
    text-decoration: none;
  }

  .navbar-search {
    display: flex;
    flex-grow: 1;
    justify-content: center;
    align-items: center;
  }

  .search-input {
    width: 80%;
    height: 40px;
    border-radius: 20px 0 0 20px;
    border: none;
    padding-left: 10px;
    outline: none;
  }

  .search-btn {
    width: 50px;
    height: 40px;
    background-color: white;
    border-radius: 0 20px 20px 0;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
  }

  .search-btn img {
    width: 20px;
  }

  .profile-menu {
    display: flex;
    align-items: center;
    position: relative;
    cursor: pointer;
  }

  .profile-img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    overflow: hidden;
  }

  .profile-dropdown {
    display: none;
    position: absolute;
    top: 60px;
    right: 0;
    background-color: white;
    border-radius: 10px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    width: 180px;
  }

  .profile-dropdown ul {
    list-style: none;
    padding: 10px;
  }

  .profile-dropdown ul li {
    padding: 10px;
    background-color: #2FD69A;
    border-radius: 7px;
    margin-bottom: 8px;
  }

  .profile-dropdown ul li a {
    text-decoration: none;
    color: white;
    display: flex;
    align-items: center;
  }

  .profile-dropdown ul li img {
    margin-right: 10px;
    width: 20px;
  }

  .profile-menu.active .profile-dropdown {
    display: block;
  }
</style>

<header>
  <div class="navbar-brand">
    <a href="main.php">mySOCIAL</a>
  </div>
  <div class="navbar-search">
    <input type="text" class="search-input" placeholder="Search mySOCIAL..." />
    <button class="search-btn">
      <img src="upload/icons/search.svg" alt="Search" />
    </button>
  </div>
  <div class="profile-menu" onclick="toggleMenu()">
    <div class="profile-img">
      <img src="<?php echo $my_dp; ?>" alt="Profile" />
    </div>
    <div class="profile-dropdown">
      <ul>
        <li><a href="profile.php?username=<?php echo $my_unm; ?>"><img src="upload/icons/user.png" alt="Profile" /><?php echo $my_nm; ?></a></li>
        <li><a href="message.php"><img src="upload/icons/message.svg" alt="Messages" />Messages</a></li>
        <li><a href="friend.php"><img src="icon/bxs-user-check.svg" alt="Friends" />Friends</a></li>
        <li><a href="notification.php"><img src="upload/icons/bell.svg" alt="Notifications" />Notifications</a></li>
        <li><a href="logout.php"><img src="upload/icons/logout.svg" alt="Logout" />Log Out</a></li>
      </ul>
    </div>
  </div>
</header>

<script>
  function toggleMenu() {
    document.querySelector('.profile-menu').classList.toggle('active');
  }
</script>
