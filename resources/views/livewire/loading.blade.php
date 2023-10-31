<div>
 <div x-show="open" class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true" id="modalScheduleDetail">
     <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
     <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
         <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
             <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-5xl w-full">
             <button @click="open = ! open" class="absolute right-3 top-2 text-2xl"><i class="bi bi-x-circle"></i></button>
                 <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                     <div class="mt-3 sm:ml-4 sm:mt-0 sm:text-left">
                      <div class="animate-pulse">
                          <div class="h-7 bg-gray-400 w-32"></div>
                      </div>
                         <div class="mt-2">
                             <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                              <tbody>
                                  @for ($i = 0; $i < 14; $i++)
                                   <tr class="bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700 animate-pulse">
                                       <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                           
                                       </th>
                                       <td class="w-full">
                                           <!-- Isi jika tidak ada booking -->
                                       </td>
                                   </tr>
                                  @endfor
                              </tbody>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div>
