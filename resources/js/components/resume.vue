<template>
  <div class="col-md-12 page">
    <div class="col-md-5">
      <div class="form-group">
        <button class="btn btn-success" @click="pickFile">Upload File</button>
        <input type="file" style="display:none" ref="img" accept="image/*" @change="filePicked">
      </div>
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

      <div class="form-group">
        <div class="collapse" id="collapseExample">
          <div class="flex">
            <div class="flex_wide col-md-5">
              <label>School</label>
              <input class="form-control">
            </div>
            <div class="flex_wide col-md-5">
              <label for>Degree</label>
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="flex">
            <div class="col-md-3">
              <label for>Start Date</label>
              <input type="date" name id class="form-control">
            </div>
            <div class="col-md-3">
              <label for>End Date</label>
              <input type="date" name id class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <a
          class="btn btn-primary"
          data-toggle="collapse"
          href="#collapseExample"
          role="button"
          aria-expanded="false"
          aria-controls="collapseExample"
        >Add Education</a>
      </div>
    </div>

    <div class="col-md-6 widesheet wide bottom-shadow">
      <div class="flex">
        <div style="flex:0 1 10%">
          <img :src="fullImage" style="height:50px;width:50px">
        </div>
        <div style="flex:50%">
          <h4>{{ fullname }}</h4>
          <h6>{{ job_title }}</h6>
        </div>
      </div>

      <div class="flex">
        <div class="flex_wide">
          <h3>Profile</h3>
          {{ tag_line }}
        </div>
        <div class="flex_narrow">
          <h3>Details</h3>
          {{ phone_number }}
          {{ email }}
        </div>
      </div>
      <div class="flex">
        <div class="flex_wide">
          <div>
            <h3>Employement History</h3>
            <div v-for="(jobs, index) in employeement_history" v-bind:key="index">
              <h6>{{ jobs.job_title }} at {{ jobs.Employer }}, {{ jobs.city }}</h6>
              <p>{{ jobs.start_date }} - {{ jobs.end_date }}</p>
              <p>{{ jobs.description }}</p>
            </div>
          </div>
          <div>
            <h3>Education</h3>
            <div v-for="(education, index) in educations" v-bind:key="index">
              {{ education.degree }}, {{ education.school }}, {{ education.city}}
              <p>{{ education.start_date }} - {{ education.end_date }}</p>
              <p>{{ education.description }}</p>
            </div>
          </div>
          <div>
            <h3>Internships</h3>
            <div v-for="(internship, index) in internships" v-bind:key="index">
              {{ internship.title }} at {{ internship.Employer }}
              <p>{{internship.start_date}} - {{ internship.end_date }}</p>
              <p>{{ internship.description }}</p>
            </div>
          </div>
        </div>
        <div class="flex_narrow">
          <h3>Skills</h3>
          <div v-for="(skill, index) in skills" v-bind:key="index">
            <h6>{{ skill.skill_name }}</h6>
            <div class="progress">
              <div
                class="progress-bar"
                role="progressbar"
                :style="'width:'+skill.level + '%'"
                :aria-valuenow="skill.level +'%'"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
            </div>
          </div>
          <h3>Hobbies</h3>
          <h6 v-for="(hobby, index) in hobbies" v-bind:key="index">{{ hobby }}</h6>
          <h3>Languages</h3>
          <div v-for="(lang, index) in languages" v-bind:key="index">
            <h6>{{ lang.name }}</h6>
            <div class="progress">
              <div
                class="progress-bar"
                role="progressbar"
                :style="'width:'+lang.level + '%'"
                :aria-valuenow="lang.level +'%'"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    pickFile() {
      this.$refs.img.click();
    },
    filePicked(e) {
      const files = e.target.files;
      if (files[0] !== undefined) {
        this.imageName = files[0].name;
        if (this.imageName.lastIndexOf(".") <= 0) {
          return;
        }
        const fr = new FileReader();
        fr.readAsDataURL(files[0]);
        fr.addEventListener("load", () => {
          this.fullImage = fr.result;
          this.imageFile = files[0]; // this is an image file that can be sent to server...
        });
      } else {
        this.imageFile = "";
        this.imageUrl = "";
      }
    }
  },
  data: function() {
    return {
      fullImage: "",
      imageFile: "",
      imageUrl: "",
      fullname: "Naveed Zahoor",
      job_title: "Teacher",
      tag_line: "Win and win are the only options here",
      phone_number: "090078601",
      email: "mymail@mymail.com",
      links: {
        facebook: "facebook.com",
        twitter: "twitter.com"
      },
      internships: {
        intern1: {
          title: "PHP Dev",
          Employer: "Arfa Tower",
          start_date: "May 2019",
          end_date: "November 2019",
          description: "No disc"
        },
        intern2: {
          title: "Jquery Dev",
          Employer: "No one",
          start_date: "July 2018",
          end_date: "December 2019",
          description: "Some desc"
        }
      },
      educations: {
        edu1: {
          school: "BZU",
          degree: "BSIT",
          start_date: "May 2019",
          end_date: "December 2019",
          description: "Completed My BS",
          city: "Multan"
        }
      },
      employeement_history: {
        job: {
          job_title: "Laravel Developer",
          Employer: "Bluehorn tech",
          start_date: "May, 2019",
          end_date: "August, 2019",
          city: "Lahore",
          description: "Worked as Laravel Developer"
        },
        job1: {
          job_title: "Laravel Developer",
          Employer: "Bluehorn tech",
          start_date: "May, 2019",
          end_date: "August, 2019",
          city: "Lahore",
          description: "Worked as Laravel Developer"
        }
      },
      skills: {
        skill1: {
          skill_name: "Laravel",
          level: "5"
        },
        skill2: {
          skill_name: "JQuery",
          level: "8"
        },
        skill3: {
          skill_name: "Vue",
          level: "10"
        },
        skill4: {
          skill_name: "Vue",
          level: "20"
        },
        skill5: {
          skill_name: "Vue",
          level: "30"
        }
      },
      languages: {
        lang1: {
          name: "Urdu",
          level: 5
        },
        lang2: {
          name: "English",
          level: 50
        }
      },

      hobbies: ["Cooking", "Writing", "Gaming"]
    };
  }
};
</script>

<style >
.flex {
  display: flex;
  margin-left: 3%;
  margin-top: 1%;
}
.flex_wide {
  flex: 70%;
}
.flex_narrow {
  flex: 20%;
}
.sheet {
  border-color: black;
  display: flex;
}
.page {
  display: flex;
}
.first_column {
  flex: 80%;
}
.second_column {
  flex: 50%;
}
.widesheet {
  position: relative;
  padding: 5px 10px;
  background-color: white;
  /* margin: 60px auto; */
  font: normal 12px/21px sans-serif;
  color: #444;
}
.wide {
  width: 80%;
}
.widesheet:before,
.widesheet:after {
  content: "";
  position: absolute;
  left: 0;
  box-shadow: 0 0 10px black;
  border-radius: 50%;
  width: 100%;
  height: 20px;
  display: none;
}
</style>
