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
        <input type="text" class="form-control" v-model="title" placeholder="Job Title">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" v-model="phone_number" placeholder="Phone Number">
      </div>

      <div class="form-group">
        <div class="collapse" id="collapseExample">
          <div class="flex">
            <div class="flex_wide col-md-5">
              <label>School</label>
              <input v-model="education_school" class="form-control">
            </div>
            <div class="flex_wide col-md-5">
              <label for>Degree</label>
              <input type="text" v-model="education_degree" class="form-control">
            </div>
          </div>
          <div class="flex">
            <div class="col-md-3">
              <label for>Start Date</label>
              <date-picker v-model="start_date" :config="options"></date-picker>
            </div>
            <div class="col-md-3">
              <label for>End Date</label>
              <date-picker v-model="end_date" :config="options"></date-picker>
            </div>
            <div class="col-md-4">
              <label for>City</label>
              <input type="text" v-model="education_city" name id class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for>Description</label>
            <textarea
              class="form-control col-md-6"
              v-model="education_description"
              cols="10"
              rows="3"
            ></textarea>
          </div>
          <div class="form-group">
            <button class="btn btn-danger" @click="saveEducation()">Save Education</button>
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
      <div class="form-group">
        <div id="skills" class="collapse">
          <h4>Skills</h4>
          <div class="form-group">
            <input type="text" class="form-control" v-model="skill_name" placeholder="Skill Name">
            <label for>How much would you rate yourself:</label>
            <select name class="form-control" v-model="skill_level">
              <option :value="index * 10" v-for="index in 10" v-bind:key="index">{{ index}}</option>
            </select>
          </div>
          <div class="form-group">
            <button class="btn btn-danger" @click="saveSkills()">Save Skill</button>
          </div>
        </div>
      </div>
      <div class="form-group">
        <a
          href="#skills"
          data-toggle="collapse"
          class="btn btn-primary"
          role="button"
          aria-controls="skills"
          aria-expanded="false"
        >Add Skills</a>
      </div>
      <div class="form-group">
        <div id="language" class="collapse">
          <h4>Language</h4>
          <div class="form-group">
            <input type="text" class="form-control" v-model="lang_name" placeholder="Language Name">
            <label for>How much would you rate yourself:</label>
            <select name class="form-control" v-model="lang_level">
              <option :value="index * 10" v-for="index in 10" v-bind:key="index">{{ index}}</option>
            </select>
          </div>
          <div class="form-group">
            <button class="btn btn-danger" @click="saveLanguage()">Save Language</button>
          </div>
        </div>
      </div>
      <div class="form-group">
        <a
          href="#language"
          data-toggle="collapse"
          class="btn btn-primary"
          role="button"
          aria-controls="language"
          aria-expanded="false"
        >Add Language</a>
      </div>
      <div class="form-group">
        <div id="internships" class="collapse">
          <h4>Internship</h4>
          <div class="form-group">
            <div class="form-group">
              <input
                type="text"
                name
                id
                placeholder="Job Title"
                v-model="intern_job_title"
                class="form-control"
              >
            </div>
            <div class="form-group">
              <input class="form-control" v-model="intern_employer" placeholder="Employer">
            </div>
            <label for>Start Date</label>
            <date-picker v-model="intern_start_date" :config="options"></date-picker>
            <div class="form-group">
              <label for>End Date</label>
              <date-picker v-model="intern_end_date" :config="options"></date-picker>
            </div>
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                v-model="intern_desc"
                placeholder="Description"
              >
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-danger" @click="saveInternship()">Save Internship</button>
          </div>
        </div>
      </div>
      <div class="form-group">
        <a
          href="#internships"
          data-toggle="collapse"
          class="btn btn-primary"
          role="button"
          aria-controls="internships"
          aria-expanded="false"
        >Add Internships</a>
      </div>
      <div class="form-group">
        <div id="employement" class="collapse">
          <h4>Employement</h4>
          <div class="form-group">
            <div class="form-group">
              <input
                v-model="job_title"
                type="text"
                name
                id
                placeholder="Job Title"
                class="form-control"
              >
            </div>
            <div class="form-group">
              <input class="form-control" v-model="job_employer" placeholder="Employer">
            </div>
            <label for>Start Date</label>
            <date-picker v-model="job_start_date" :config="options"></date-picker>
            <div class="form-group">
              <label for>End Date</label>
              <date-picker v-model="job_end_date" :config="options"></date-picker>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" v-model="job_desc" placeholder="Description">
            </div>
            <div class="form-group">
              <input type="text" name id v-model="job_city" placeholder="City" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <button class="btn btn-danger" @click="saveEmployment()">Save Employment</button>
          </div>
        </div>
      </div>
      <div class="form-group">
        <a
          href="#employement"
          data-toggle="collapse"
          class="btn btn-primary"
          role="button"
          aria-controls="employement"
          aria-expanded="false"
        >Add Employement</a>
      </div>
    </div>

    <div class="col-md-6 widesheet wide bottom-shadow">
      <div class="flex">
        <div style="flex:0 1 10%">
          <img v-if="fullImage" :src="fullImage" style="height:50px;width:50px">
        </div>
        <div style="flex:50%">
          <h4>{{ fullname }}</h4>
          <h6 v-if="title">{{ title }}</h6>
        </div>
      </div>

      <div class="flex">
        <div class="flex_wide">
          <h3 v-if="tag_line">Profile</h3>
          {{ tag_line }}
        </div>
        <div class="flex_narrow">
          <h3 v-if="phone_number || email">Details</h3>
          {{ phone_number }}
          <span v-if="email">{{ email }}</span>
        </div>
      </div>
      <div class="flex">
        <div class="flex_wide">
          <div v-if="employeement_history.length > 0">
            <h3>Employement History</h3>
            <div v-for="(jobs, index) in employeement_history" v-bind:key="index">
              <h6>{{ jobs.job_title }} at {{ jobs.job_employer }}, {{ jobs.job_city }}</h6>
              <p>{{ jobs.job_start_date }} - {{ jobs.job_end_date }}</p>
              <p>{{ jobs.job_desc }}</p>
            </div>
          </div>
          <div v-if="educations.length > 0">
            <h3>Education</h3>
            <div v-for="(education, index) in educations" v-bind:key="index">
              {{ education.degree }}, {{ education.school }}, {{ education.city}}
              <p>{{ education.start_date }} - {{ education.end_date }}</p>
              <p>{{ education.education_description }}</p>
            </div>
          </div>
          <div v-if="internships.length > 0">
            <h3>Internships</h3>
            <div v-for="(internship, index) in internships" v-bind:key="index">
              {{ internship.intern_job_title }} at {{ internship.intern_employer }}
              <p>{{internship.intern_start_date}} - {{ internship.intern_end_date }}</p>
              <p>{{ internship.intern_desc }}</p>
            </div>
          </div>
        </div>
        <div class="flex_narrow">
          <h3 v-if="skills.length > 0">Skills</h3>
          <div v-for="(skill, index) in skills" v-bind:key="index">
            <h6>{{ skill.skill_name }}</h6>
            <div class="progress">
              <div
                class="progress-bar"
                role="progressbar"
                :style="'width:'+skill.skill_level + '%'"
                :aria-valuenow="skill.skill_level +'%'"
                aria-valuemin="0"
                aria-valuemax="100"
              ></div>
            </div>
          </div>
          <div v-if="hobbies.length > 0">
            <h3>Hobbies</h3>
            <h6 v-for="(hobby, index) in hobbies" v-bind:key="index">{{ hobby }}</h6>
          </div>
          <h3 v-if="languages.length > 0">Languages</h3>
          <div v-for="(lang, index) in languages" v-bind:key="index">
            <h6>{{ lang.lang_name }}</h6>
            <div class="progress">
              <div
                class="progress-bar"
                role="progressbar"
                :style="'width:'+lang.lang_level + '%'"
                :aria-valuenow="lang.lang_level +'%'"
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
// Import this component
import datePicker from "vue-bootstrap-datetimepicker";

// Import date picker css
import "pc-bootstrap4-datetimepicker/build/css/bootstrap-datetimepicker.css";
export default {
  components: {
    datePicker
  },
  props: ["user"],
  methods: {
    saveInternship() {
      var internship = {
        intern_job_title: this.intern_job_title,
        intern_employer: this.intern_employer,
        intern_start_date: this.intern_start_date,
        intern_end_date: this.intern_end_date,
        intern_desc: this.intern_desc
      };
      this.internships.push(internship);
      this.intern_job_title = "";
      this.intern_employer = "";
      this.intern_start_date = "";
      this.intern_end_date = "";
      this.intern_desc = "";
    },
    saveEducation() {
      var education = {
        education_description: this.education_description,
        start_date: this.start_date,
        end_date: this.end_date,
        school: this.education_school,
        degree: this.education_degree,
        city: this.education_city
      };

      this.educations.push(education);
      this.education_description = "";
      this.start_date = "";
      this.end_date = "";
      this.education_city = "";
      this.education_school = "";
      this.education_degree = "";
    },
    saveSkills() {
      var skill = {
        skill_name: this.skill_name,
        skill_level: this.skill_level
      };
      this.skill_name = "";
      this.skill_level = "";
      this.skills.push(skill);
    },
    saveLanguage() {
      var lang = {
        lang_name: this.lang_name,
        lang_level: this.lang_level
      };
      this.languages.push(lang);
    },
    saveEmployment() {
      var employement = {
        job_title: this.job_title,
        job_employer: this.job_employer,
        job_start_date: this.job_start_date,
        job_end_date: this.job_end_date,
        job_desc: this.job_desc,
        job_city: this.job_city
      };
      this.employeement_history.push(employement);
    },
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
      job_employer: "",
      job_start_date: "",
      job_end_date: "",
      job_desc: "",
      job_city: "",
      start_date: "",
      intern_employer: "",
      intern_job_title: "",
      intern_start_date: "",
      intern_end_date: "",
      intern_desc: "",
      end_date: "",
      education_description: "",
      education_city: "",
      skill_name: "",
      lang_level: "",
      lang_name: "",
      skill_level: "",
      education_degree: "",
      education_school: "",
      options: {
        format: "MM/YYYY",
        useCurrent: false
      },
      fullImage: "",
      imageFile: "",
      imageUrl: "",
      fullname: "",
      title: "",
      job_title: "",
      tag_line: "",
      phone_number: "",
      email: "",
      links: [],
      internships: [],
      educations: [],
      employeement_history: [],
      skills: [],
      languages: [],

      hobbies: []
    };
  },
  created() {
    this.fullname = this.user.name;
    this.email = this.user.email;
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
