<template>
<div class="col-md-12 page">
    <div class="col-md-5">
            <div class="form-group">
            <input type="text" class="form-control" v-model="fullname" placeholder="Full Name">

            </div>
            <div class="form-group">
            <input type="text" class="form-control" v-model="tag_line" placeholder="Tag Line">

            </div>
            <div class="form-group">
            <input type="text" class="form-control" v-model="job_title" placeholder="Job Title">

            </div>
            <div class="form-group">
            <input type="text" class="form-control" v-model="phone_number" placeholder="Phone Number">

            </div>
    </div>
    <div class="col-md-6 widesheet wide bottom-shadow">
                <h4>{{ fullname }}</h4>
            <h6> {{ job_title }} </h6>

        <div class="sheet">

           <div class="first_column">
               <h4> Profile </h4>
            <h6>{{ tag_line }}</h6>
           </div>
           <div class="second_column">
               <div>
                   <h4>Details</h4>
                   <h6>{{ phone_number }}</h6>
                   <h6>{{ email }}</h6>
               </div>
               <div>
                   <h4> Links </h4>
                   <h6 v-for="(index, link) in links" v-bind:key="index"> <a :href="index"> {{ link }}  </a> </h6>
               </div>

           </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data: function(){
        return {
        fullname: "Naveed Zahoor",
        job_title: "Teacher",
        tag_line: "Win and win are the only options here",
        phone_number: "090078601",
        email: "mymail@mymail.com",
        links: {
           "facebook" : "facebook.com",
           "twitter" : "twitter.com"
        }
        }
    }
}
</script>

<style >
    .sheet {
        border-color: black;
        display: flex
    }
    .page{
        display: flex
    }
    .first_column{
        flex: 50%
    }
    .second_column{
        flex: 50%
    }
    .widesheet{
        position: relative;
	padding: 5px 10px;
	background-color: white;
	margin: 60px auto;
	font: normal 12px/21px sans-serif;
	color: #444;
    }
    .wide { width: 80%; }
    .widesheet:before, .widesheet:after {
	content: '';
	position: absolute;
	left: 0;
	box-shadow: 0 0 10px black;
	border-radius: 50%;
	width: 100%;
	height: 20px;
	display: none;
}

</style>
