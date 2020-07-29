<template>
    <div class="container">
        <div class="row pt-5">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="alert alert-primary" role="alert">
                    Modal Laravel - Vue using Bootstrap 4!
                </div>
            </div>
        </div>
        <div class="row pt-5">

            <div class="col-lg-12 d-flex justify-content-end pb-2">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                    Show Modal <i class="fa fa-plus" aria-hidden="true"></i>
                </button>
            </div>

            <!-- Create Item Modal -->
            <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-dark">
                            <div class="text-light">
                                <h5 class="modal-title" id="exampleModalLabel">Create a new League</h5>
                                <h7>Choose from the options below to customize your league</h7>
                            </div>
                            
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="text-light" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div>
                            <ul class="nav text-dark">
                                <li class="nav-item m-auto text-dark">
                                    <a class="nav-link text-dark" href="#">1.League info</a>
                                </li>
                                <li class="nav-item m-auto">
                                    <a class="nav-link active" style="color:#FF8300" href="#">2.Invite Friends</a>
                                </li>
                                <li class="nav-item m-auto text-dark">
                                    <a class="nav-link text-dark" href="#">3.My Team</a>
                                </li>
                            </ul>
                        </div>
                        <form method="post" enctype="multipart/form-data" @submit.prevent="createItem">
                            <div class="modal-body d-flex">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="title"><b>Share the link to your league</b></label>
                                            <input type="text" class="form-control" id="title" placeholder="Enter title"  value="http://encorefan/league/5Cryoje22B/" v-model="newItem.title">
                                            <label for="" style="margin-top:3em;">share</label>
                                            <div class="d-block body-left">
                                                <div class="d-flex">
                                                    <img src="https://lh3.googleusercontent.com/ogw/ADGmqu-0pEsvzptN7UkPaTtcUFaUVsq1PYv-pO33fp7b=s32-c-mo" alt="">
                                                    <p>Encore Fantasy Feed</p>
                                                </div>
                                                <div class="d-flex">
                                                    <img src="https://lh3.googleusercontent.com/ogw/ADGmqu-0pEsvzptN7UkPaTtcUFaUVsq1PYv-pO33fp7b=s32-c-mo" alt="">
                                                    <p>Facebook</p>
                                                </div>
                                                <div class="d-flex">
                                                    <img src="https://lh3.googleusercontent.com/ogw/ADGmqu-0pEsvzptN7UkPaTtcUFaUVsq1PYv-pO33fp7b=s32-c-mo" alt="">
                                                    <p>Twitter</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group d-block body-right">
                                            <label for="description"><b>Invite your fan club</b></label>
                                            <div class="d-flex justify-content-between right-item">
                                                <div class="d-flex">
                                                    <img src="https://lh3.googleusercontent.com/ogw/ADGmqu-0pEsvzptN7UkPaTtcUFaUVsq1PYv-pO33fp7b=s32-c-mo" alt="">
                                                    <p>Harris Mathis</p>
                                                </div>
                                                <p style ="color:#FF8300">INVITE</p>
                                            </div>
                                            <div class="d-flex justify-content-between right-item">
                                                <div class="d-flex">
                                                    <img src="https://lh3.googleusercontent.com/ogw/ADGmqu-0pEsvzptN7UkPaTtcUFaUVsq1PYv-pO33fp7b=s32-c-mo" alt="">
                                                    <p>Blaze Sanders</p>
                                                </div>
                                                <p style ="color:#FF8300">INVITE</p>
                                            </div>
                                            <div class="d-flex justify-content-between right-item">
                                                <div class="d-flex">
                                                    <img src="https://lh3.googleusercontent.com/ogw/ADGmqu-0pEsvzptN7UkPaTtcUFaUVsq1PYv-pO33fp7b=s32-c-mo" alt="">
                                                    <p>Jed Adkins</p>
                                                </div>
                                                <p style ="color:#FF8300">INVITE</p>
                                            </div>
                                            <div class="d-flex justify-content-between right-item">
                                                <div class="d-flex">
                                                    <img src="https://lh3.googleusercontent.com/ogw/ADGmqu-0pEsvzptN7UkPaTtcUFaUVsq1PYv-pO33fp7b=s32-c-mo" alt="">
                                                    <p>Tomas Friedman</p>
                                                </div>
                                                <p style ="color:#FF8300">INVITE</p>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                                <button type="submit" class="btn btn-warning">Go to Next Step</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.getItems();
        },
        data: () => ({
            items: [],
            newItem: { 'title': '', 'description': ''},
            fillItem: { 'title': '', 'description': '', 'id': ''}
        }),
        methods: {
            getItems() {
                axios.get( 'vue-items' ).then( response => {
                    let answer = response.data;
                    this.items = answer.items;
                })
            },
            createItem() {
                let input = this.newItem;

                axios.post('vue-items', input).then( (response) => {

                    this.items.push(response.data);
                    this.newItem = {'title': '', 'description': ''};
                    $('#create-item').modal('hide');

                }).catch( (error) => {
                    console.log( error.response.data )
                })
            },
            editItem( item ) {
                let edit = this.fillItem;

                edit.title = item.title;
                edit.description = item.description;
                edit.id = item.id;

                $("#edit-item").modal('show');
            },
            updateItem( id ){
                let input = this.fillItem;

                axios.put('vue-items/' + id, input).then( (response)=> {

                    this.getItems();
                    this.fillItem = {'title': '', 'description': '', 'id': ''};
                    $('#edit-item').modal('hide');

                }).catch( (error)=> {
                    console.log( error.response.data )
                })
            },
            deleteItem( item ) {
                axios.delete('vue-items/' + item.id).then( (response) => {
                    this.getItems();
                });
            }
        }
    }
</script>