<style>
div {
  background-color: lightgrey;
  width: 300px;
  border: 15px solid green;
  padding: 50px;
  margin: 20px auto;
}
</style>
<h2 style="text-align: center;">User Verification Process</h2>


<div style="background-color:beige;width: 300px;border:15px solid yellow;padding:50px;margin:20px  auto;">
<p style="font-size: large;">Dear User , {{$name}}!!</p>
<p style="font-size: large;text-align:center">your  one time password verification {{$otp}}</p>
<a href="{{url('otp')}}" style="border:2px sold blue; padding:5px; color:white;letter-spacing:1px;font-size:15px;">Go to here</a>
</div>