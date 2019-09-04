<template>
    <!-- https://github.com/KrunalLathiya/VueLaravelImageUpload/blob/master/resources/assets/js/components/ImageuploadComponent.vue -->
    <div class="file-uploader-wrapper">
        <h3>Featured Image</h3>
        <div class="filezone">
            <input type="file" id="files" ref="files" multiple v-on:change="handleFiles()"/>
            <p>
                Drop your files here or click to search.
            </p>
        </div>

        <div v-for="(file, key) in files" class="file-listing">
            <img class="img-fluid" v-bind:ref="'preview'+parseInt(key)">
            <span class="small">{{ file.name }}</span>
            <div class="alert alert-success" role="alert" v-if="file.id > 0">
                Success
                <input type="hidden" :name="input_name" :value="file.id"/>
                <input type="hidden" :name="attachment_id" :value="attachment_id"/>
                <input type="hidden" :name="attachment_type" :value="attachment_type"/>
            </div>
            <div class="remove-container pb-2" v-else>
                <button class="btn btn-danger remove" v-on:click="removeFile(key)">Remove</button>
            </div>
        </div>

        <button class="btn btn-primary submit-button" v-on:click="submitFiles()" v-show="files.length > 0">Submit</button>
    </div>
</template>

<script>
    export default {
        props: [
            'input_name',
            'post_url',
            'attachment_id',
            'attachment_type'
        ],
        data() {
            return {
                files: []
            }
        },
        methods: {
            removeFile( key ){
                this.files.splice( key, 1 );
                this.getImagePreviews();
            },
            handleFiles() {
                let uploadedFiles = this.$refs.files.files;

                for(let i = 0; i < uploadedFiles.length; i++) {
                    this.files.push(uploadedFiles[i]);
                }
                this.getImagePreviews();
            },
            getImagePreviews(){
                for( let i = 0; i < this.files.length; i++ ){
                    if ( /\.(jpe?g|png|gif)$/i.test( this.files[i].name ) ) {
                        let reader = new FileReader();
                        reader.addEventListener("load", function(){
                            this.$refs['preview'+parseInt(i)][0].src = reader.result;
                        }.bind(this), false);
                        reader.readAsDataURL( this.files[i] );
                    }else{
                        this.$nextTick(function(){
                            this.$refs['preview'+parseInt(i)][0].src = '/img/generic.png';
                        });
                    }
                }
            },
            submitFiles() {
                for( let i = 0; i < this.files.length; i++ ){
                    if(this.files[i].id) {
                        continue;
                    }
                    let formData = new FormData();
                    formData.append('file', this.files[i]);

                    axios.post('/' + this.post_url,
                        formData,
                        {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }
                    ).then(function(data) {
                        this.files[i].id = data['data']['id'];
                        this.files.splice(i, 1, this.files[i]);
                        console.log('success');
                    }.bind(this)).catch(function(data) {
                        console.log('error');
                    });
                }
            }
        }
    }
</script>