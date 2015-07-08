var Validation = function () {

    return {

        //Validation
        initValidation: function () {
	        $("#ValidasiRegistrasi").validate({
	            // Rules for form validation
	            rules:
	            {
                    name:
                    {
                        required: true,
                        minlength: 5

                    },
                    alamat:
                    {
                        required: true,
                        minlength: 5
                    },
                    tanggalLahir:
                    {
                        required: true,
                        date: true
                    },
	                required:
	                {
	                    required: true
	                },
                    nomorTelfon:
                    {
                        required: true,
                        number:true,
                        rangelength: [5, 15]
                    },
	                email:
	                {
	                    required: true,
	                    email: true
	                },
                    password:
                    {
                        required: true
                    },
                    password_confirmation:
                    {
                        required: true,
                        equalTo : "#password"
                    },
	                url:
	                {
	                    required: true,
	                    url: true
	                },
	                date:
	                {
	                    required: true,
	                    date: true
	                },
	                min:
	                {
	                    required: true,
	                    minlength: 5
	                },
	                max:
	                {
	                    required: true,
	                    maxlength: 5
	                },
	                range:
	                {
	                    required: true,
	                    rangelength: [5, 10]
	                },
	                digits:
	                {
	                    required: true,
	                    digits: true
	                },
	                number:
	                {
	                    required: true,
	                    number: true
	                },
	                minVal:
	                {
	                    required: true,
	                    min: 5
	                },
	                maxVal:
	                {
	                    required: true,
	                    max: 100
	                },
	                rangeVal:
	                {
	                    required: true,
	                    range: [5, 100]
	                }
	            },

	            // Messages for form validation
	            messages:
	            {
                    name:
                    {
                        required: 'Masukan Nama lengkap anda|Min:5 karakter'
                    },
                    alamat:
                    {
                        required: 'Masukan alamat lengkap anda'
                    },

                    tanggalLahir:
                    {
                        required: 'Masukan Tanggal Lahir anda'
                    },

                    required:
	                {
	                    required: 'Please enter something'
	                },
                    nomorTelfon:
                    {
                        required: 'Masukan nomor telfon/HP anda|Number Only'
                    },
	                email:
	                {
	                    required: 'Masukan email anda dengan format email'
	                },
                    password:
                    {
                        required: 'Masukan Password anda'
                    },
                    password_confirmation:
                    {
                        required: 'Masukan Password yang sama'
                    },
	                url:
	                {
	                    required: 'Please enter your URL'
	                },
	                date:
	                {
	                    required: 'Please enter some date'
	                },
	                min:
	                {
	                    required: 'Please enter some text'
	                },
	                max:
	                {
	                    required: 'Please enter some text'
	                },
	                range:
	                {
	                    required: 'Please enter some text'
	                },
	                digits:
	                {
	                    required: 'Please enter some digits'
	                },
	                number:
	                {
	                    required: 'Please enter some number'
	                },
	                minVal:
	                {
	                    required: 'Please enter some value'
	                },
	                maxVal:
	                {
	                    required: 'Please enter some value'
	                },
	                rangeVal:
	                {
	                    required: 'Please enter some value'
	                }
	            },

	            // Do not change code below
	            errorPlacement: function(error, element)
	            {
	                error.insertAfter(element.parent());
	            }
	        });
        }

    };
}();