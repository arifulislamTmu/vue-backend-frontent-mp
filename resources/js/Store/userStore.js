import { defineStore } from 'pinia';

export const userStore = defineStore(
    {
      id:"userStoreId",
        state: () => ({
            token: localStorage.getItem('token') || 0,
        }),
        getters: {
            getToken: (state) => {
                return state.token
              },
        },
        actions: {
            setToken: function (token) {
                this.token = token,
                    localStorage.setItem('token', token);
            },

            removeToken: function () {
                this.token = 0,
                    localStorage.removeItem('token');
            }
        },


    });
