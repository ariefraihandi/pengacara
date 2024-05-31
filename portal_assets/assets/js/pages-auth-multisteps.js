/**
 *  Page auth register multi-steps
 */

'use strict';


// Multi Steps Validation
// --------------------------------------------------------------------
document.addEventListener('DOMContentLoaded', function (e) {
  (function () {
    const stepsValidation = document.querySelector('#multiStepsValidation');
    if (typeof stepsValidation !== undefined && stepsValidation !== null) {
      // Multi Steps form
      const stepsValidationForm = stepsValidation.querySelector('#multiStepsForm');
      // Form steps
      const stepsValidationFormStep1 = stepsValidationForm.querySelector('#accountDetailsValidation');
      const stepsValidationFormStep2 = stepsValidationForm.querySelector('#officeInfoValidation');
      const stepsValidationFormStep3 = stepsValidationForm.querySelector('#billingLinksValidation');
      // Multi steps next prev button
      const stepsValidationNext = [].slice.call(stepsValidationForm.querySelectorAll('.btn-next'));
      const stepsValidationPrev = [].slice.call(stepsValidationForm.querySelectorAll('.btn-prev'));

      const multiStepsExDate = document.querySelector('.multi-steps-exp-date'),
        multiStepsCvv = document.querySelector('.multi-steps-cvv'),
        multiStepsMobile = document.querySelector('.multi-steps-mobile'),
        multiStepsPincode = document.querySelector('.multi-steps-pincode'),
        multiStepsCard = document.querySelector('.multi-steps-card');

      // Expiry Date Mask
      if (multiStepsExDate) {
        new Cleave(multiStepsExDate, {
          date: true,
          delimiter: '/',
          datePattern: ['m', 'y']
        });
      }

      // CVV
      if (multiStepsCvv) {
        new Cleave(multiStepsCvv, {
          numeral: true,
          numeralPositiveOnly: true
        });
      }

      // Mobile
      if (multiStepsMobile) {
        new Cleave(multiStepsMobile, {
          phone: true,
          phoneRegionCode: 'US'
        });
      }

      // Pincode
      if (multiStepsPincode) {
        new Cleave(multiStepsPincode, {
          delimiter: '',
          numeral: true
        });
      }

      // Credit Card
      if (multiStepsCard) {
        new Cleave(multiStepsCard, {
          creditCard: true,
          onCreditCardTypeChanged: function (type) {
            if (type != '' && type != 'unknown') {
              document.querySelector('.card-type').innerHTML =
                '<img src="' + assetsPath + 'img/icons/payments/' + type + '-cc.png" height="28"/>';
            } else {
              document.querySelector('.card-type').innerHTML = '';
            }
          }
        });
      }

      let validationStepper = new Stepper(stepsValidation, {
        linear: true
      });

      // Account details
      const multiSteps1 = FormValidation.formValidation(stepsValidationFormStep1, {
        fields: {
          multiStepsName: {
            validators: {
              notEmpty: {
                message: 'Please enter name'
              },
              stringLength: {
                min: 4,
                max: 50,
                message: 'The name must be more than 5 and less than 45 characters long'
              },
              regexp: {
                regexp: /^[a-zA-Z.,' ]+$/,
                message: 'Nama hanya boleh terdiri dari huruf, titik, koma, dan spasi'
              }          
            }
          },
          multiStepsUsername: {
            validators: {
                notEmpty: {
                    message: 'Silakan Input username'
                },
                stringLength: {
                    min: 4,
                    max: 50,
                    message: 'Panjang nama harus antara 4 dan 50 karakter'
                },
                regexp: {
                    regexp: /^[a-z_]+$/,
                    message: 'Nama hanya boleh terdiri dari huruf kecil dan garis bawah (_)'
                }
            }
          },
          multiStepsEmail: {
            validators: {
              notEmpty: {
                message: 'Please enter email address'
              },
              emailAddress: {
                message: 'The value is not a valid email address'
              }
            }
          },
          multiStepsPass: {
            validators: {
              notEmpty: {
                message: 'Please enter password'
              }
            }
          },
          multiStepsConfirmPass: {
            validators: {
              notEmpty: {
                message: 'Confirm Password is required'
              },
              identical: {
                compare: function () {
                  return stepsValidationFormStep1.querySelector('[name="multiStepsPass"]').value;
                },
                message: 'The password and its confirm are not the same'
              }
            }
          },
          multiStepsWhatsapp: {
            validators: {
              notEmpty: {
                message: 'Input nomor WhatsApp'
              },
              regexp: {
                regexp: /^[0-9]+$/,
                message: 'Input hanya angka'
              }
            }
          },          
          multiStepsProvince: {
            validators: {
                notEmpty: {
                    message: 'Silakan pilih Provinsi'
                }
            }
          },
          multiStepsRegency: {
              validators: {
                  notEmpty: {
                      message: 'Silakan pilih Kabupaten/Kota'
                  }
              }
          },
          multiStepsDistrict: {
              validators: {
                  notEmpty: {
                      message: 'Silakan pilih Kecamatan'
                  }
              }
          },
          multiStepsVillage: {
              validators: {
                  notEmpty: {
                      message: 'Silakan pilih Desa'
                  }
              }
          }
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            // Use this for enabling/changing valid/invalid class
            // eleInvalidClass: '',
            eleValidClass: '',
            rowSelector: '.col-sm-6'
          }),
          autoFocus: new FormValidation.plugins.AutoFocus(),
          submitButton: new FormValidation.plugins.SubmitButton()
        },
        init: instance => {
          instance.on('plugins.message.placed', function (e) {
            if (e.element.parentElement.classList.contains('input-group')) {
              e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
            }
          });
        }
      }).on('core.form.valid', function () {
        // Jump to the next step when all fields in the current step are valid
        validationStepper.next();
      });

      // Personal info
      const multiSteps2 = FormValidation.formValidation(stepsValidationFormStep2, {
        fields: {
          officeName: {
            validators: {
              notEmpty: {
                message: 'Input nama kantor'
              },
              stringLength: {
                min: 4,
                max: 50,
                message: 'min 5, max 50 Karakter'
              },
              regexp: {
                regexp: /^[a-zA-Z.,' ]+$/,
                message: 'Nama hanya boleh terdiri dari huruf, titik, koma, dan spasi'
              }          
            }
          },
          officeEmail: {
            validators: {
              notEmpty: {
                message: 'Please enter email address'
              },
              emailAddress: {
                message: 'The value is not a valid email address'
              }
            }
          },
          officePhone: {
            validators: {
              notEmpty: {
                message: 'Input nomor HP/WhatsApp'
              },
              regexp: {
                regexp: /^[0-9]+$/,
                message: 'Inputan hanya angka'
              }
            }
          },
          postCode: {
            validators: {
              notEmpty: {
                message: 'Input Kode Post'
              },
              regexp: {
                regexp: /^[0-9]+$/,
                message: 'Input hanya angka'
              }
            }
          },
          officeAddress: {
            validators: {
              notEmpty: {
                message: 'Please enter your address'
              }
            }
          }
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            // Use this for enabling/changing valid/invalid class
            // eleInvalidClass: '',
            eleValidClass: '',
            rowSelector: function (field, ele) {
              // field is the field name
              // ele is the field element
              switch (field) {
                case 'multiStepsFirstName':
                  return '.col-sm-6';
                case 'multiStepsAddress':
                  return '.col-md-12';
                default:
                  return '.row';
              }
            }
          }),
          autoFocus: new FormValidation.plugins.AutoFocus(),
          submitButton: new FormValidation.plugins.SubmitButton()
        }
      }).on('core.form.valid', function () {
        // Jump to the next step when all fields in the current step are valid
        validationStepper.next();
      });

      // Social links
      const multiSteps3 = FormValidation.formValidation(stepsValidationFormStep3, {
        fields: {
          multiStepsCard: {
            validators: {
              notEmpty: {
                message: 'Please enter card number'
              }
            }
          }
        },
        plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          bootstrap5: new FormValidation.plugins.Bootstrap5({
            // Use this for enabling/changing valid/invalid class
            // eleInvalidClass: '',
            eleValidClass: '',
            rowSelector: function (field, ele) {
              // field is the field name
              // ele is the field element
              switch (field) {
                case 'multiStepsCard':
                  return '.col-md-12';

                default:
                  return '.col-dm-6';
              }
            }
          }),
          autoFocus: new FormValidation.plugins.AutoFocus(),
          submitButton: new FormValidation.plugins.SubmitButton()
        },
        init: instance => {
          instance.on('plugins.message.placed', function (e) {
            if (e.element.parentElement.classList.contains('input-group')) {
              e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
            }
          });
        }
      }).on('core.form.valid', function () {
        // You can submit the form
        // stepsValidationForm.submit()
        // or send the form data to server via an Ajax request
        // To make the demo simple, I just placed an alert
        alert('Submitted..!!');
      });

      stepsValidationNext.forEach(item => {
        item.addEventListener('click', event => {
          // When click the Next button, we will validate the current step
          switch (validationStepper._currentIndex) {
            case 0:
              multiSteps1.validate();
              break;

            case 1:
              multiSteps2.validate();
              break;

            case 2:
              multiSteps3.validate();
              break;

            default:
              break;
          }
        });
      });

      stepsValidationPrev.forEach(item => {
        item.addEventListener('click', event => {
          switch (validationStepper._currentIndex) {
            case 2:
              validationStepper.previous();
              break;

            case 1:
              validationStepper.previous();
              break;

            case 0:

            default:
              break;
          }
        });
      });
    }
  })();
});
