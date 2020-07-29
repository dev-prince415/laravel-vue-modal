@extends( 'layouts.app' )
<style>
.modal-dialog{
	max-width:800px !important;
}
.nav-link:active{
	color: #FF8300  !important;
	border-bottom: 1px solid #FF8300;
}
.nav{
	border-bottom: 1px solid #F3F3F3;
}
.body-left img{
	border-radius: 50%;
	width:30px;
    height: 30px;
}
.body-left p{
	margin-top:auto;
	margin-bottom:auto;
}
.body-left div{
	margin-bottom: 5px;
}
.body-right img{
	border-radius: 50%;
	width:30px;
    height: 30px;
}
.body-right p{
	margin-top:auto;
	margin-bottom:auto;
}
.right-item{
	margin-bottom:10px;
    border-radius: 30px;
    border: 1px solid #F3F3F3;
    padding: 7px;

}

</style>

@section( 'content' )
	<item></item>
@endsection