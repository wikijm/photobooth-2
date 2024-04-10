// function loadStep(step) {
//     $.ajax({
//         url: 'load_step.php',
//         type: 'GET',
//         data: { step: step },
//         success: function (response) {
//             $('.premium-body').html(response);
//         },
//         error: function (xhr, status, error) {
//             console.error(error);
//         }
//     });
// }

//  function loadNextStep() {
//     // Odredi sledeći korak na osnovu trenutnog koraka ili nekog drugog kriterijuma
//     let currentStep = '<?php echo $step; ?>'; // Trenutni korak
//     let nextStep;

//     // Logika za određivanje sledećeg koraka
//     switch (currentStep) {
//         case 'collage':
//             nextStep = 'quantity';
//             break;
//         case 'quantity':
//             nextStep = 'picture';
//             break;
//         case 'picture':
//             nextStep = 'choice';
//             break;
//         case 'choice':
//             // Poslednji korak, možete postaviti logiku za zatvaranje moda ili nešto drugo
//             return;
//         default:
//             // Neophodno postaviti logiku za grešku ili neočekivano stanje
//             console.error('Invalid current step!');
//             return;
//     }

//     // Učitaj sledeći korak
//     loadStep(nextStep);
// }

// // Poziv funkcije za učitavanje prvog koraka kada se modal otvori
// $(function () {
//     let initialStep = '<?php echo $step; ?>';
//     loadStep(initialStep);
// });
