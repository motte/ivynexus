<div id="main">

        <div id="rightside">
                <div style="text-align:center; padding-top: 5px;">
                        <img src="uploads/profile/{profile_photo}" />
                </div>
                <div style="padding: 5px;">
                        <h2>Friends</h2>
                        <ul>
                                <!-- START profile_friends_sample -->
                                <li><a href="profile/view/{ID}">{users_name}</a></li>
                                <!-- END profile_friends_sample -->
                                <li><a href="relationships/all/{p_user_id}">View all</a></li>
                                <li><a href="relationships/mutual/{p_user_id}">View mutual friends</a></li>
                        </ul>
                        <h2>Rest of my profile</h2>
                        <ul>
                                <li><a href="profile/statuses/{ID}">Status updates</a></li>
                        </ul>
                </div>
        </div>

        <div id="content"><h1>{profile_name}: Edit Profile</h1>
                <form action="profile/view/{p_user_id}/edit" method="post" enctype="multipart/form-data">
                        <label for="name">Name</label><br />
                        <input type="text" id="name" name="name" value="{p_name}" /><br />
                        <label for="profile_picture">Photograph</label> <br />
                        <input type="file" id="profile_picture" name="profile_picture" />
                        <br />
                        <label for="bio">Biography</label>
                        <textarea id="bio" name="bio" cols="40" rows="6">{p_bio}</textarea>
                        <label for="school">School</label><br />
                        <input type="text" id="school" name="school" value="{p_school}" /><br />
                        <label for="internship">Internship</label><br />
                        <input type="text" id="internship" name="internship" value="{p_internship}" /><br />
                        <label for="dob">Birthday</label><br />
                        <input type="text" id="dob" class="selectdate" name="dob" value="{p_dob}" /><br />
                        <label for="gender">Gender</label><br />
                        <select id="gender" name="gender">
                                <option value="">Please select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                        </select>
                        <br />
                        <input type="submit" id="" name="" value="Save profile" />
                </form>

        </div>
</div>