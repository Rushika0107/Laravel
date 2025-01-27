<div>
<h2>Add New User</h2>
<!-- @if($errors->any())
@foreach($errors->all() as $error)
<div style="color:red">
    {{$error}}
</div>

@endforeach
@endif -->

<form action="adduser" method="post">
    @csrf
    <div class="input-wrapper">
        <input type="text" placeholder="Enter UserName" name="username">
        <span style="color:red">@error("username"){{$message}}@enderror</span>
    </div>
    <div class="input-wrapper">
        <input type="text" placeholder="Enter User Email" name="email">
        <span style="color:red">@error("email"){{$message}}@enderror</span>

    </div>
    <div class="input-wrapper">
        <input type="text" placeholder="Enter User City" name="city">
        <span style="color:red">@error("city"){{$message}}@enderror</span>

    </div>
    <div>
        <h3>User Skills</h3>
        <input type="checkbox"  name="skills[]" value="PHP" id="php">
        <label for="php">PHP</label>
        <input type="checkbox"  name="skills[]" value="PHP" id="java">
        <label for="java">JAVA</label>
        <input type="checkbox"  name="skills[]" value="PHP" id="c++">
        <label for="c++">C++</label>
        <input type="checkbox"  name="skills[]" value="PHP" id="dbms">
        <label for="dbms">DBMS</label>
        <span style="color:red">@error("skills"){{$message}}@enderror</span>

    </div>

    <div>
        <h3>Gender</h3>
        <input type="radio"  name="gender" value="male" id="male">
        <label for="male">Male</label>
        <input type="radio"  name="gender" value="female" id="female">
        <label for="female">Female</label>
        <span style="color:red">@error("gender"){{$message}}@enderror</span>

    </div>
    
    <div>
        <h3>City</h3>
        <select name="city">
            <option value="Delhi">Delhi</option>
            <option value="Mumbai">Mumbai</option>
            <option value="Assam">Assam</option>
            <option value="kashmir">Kashmir</option>
        </select>
        <span style="color:red">@error("city"){{$message}}@enderror</span>

    </div>
    <h3>Age</h3>
    <div>
        <input type="range" name="age" min="18" max="100">
        <span style="color:red">@error("age"){{$message}}@enderror</span>

    </div>

    <div class="input-wrapper">
        <span style="color:red">@error("username"){{$message}}@enderror</span>

<button>Add new user </button>
    </div>
</form>
</div>
<style>
input{
    border: orange 1px solid;
    height: 35px;
    width: 200px;
    border-radius: 2px;
    color: orange;
}
.input-wrapper{
    margin:20px
}
button{
    border: orange 1px solid;
    height: 35px;
    width: 200px;
    border-radius: 2px;
    color: orange;
    background-color:red;
    cursor:pointer;


}
</style>