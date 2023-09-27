import {
  mdiMenu,
  mdiClockOutline,
  mdiCloud,
  mdiCrop,
  mdiAccount,
  mdiCogOutline,
  mdiEmail,
  mdiLogout,
  mdiThemeLightDark,
  mdiGithub,
  mdiReact,
  mdiAccountBox,
} from "@mdi/js";

export default [  
  {
    isCurrentUser: true,
    menu: [
      {
        icon: mdiAccount,
        label: "Mi perfil",
        to: "/profile",
      },
      {
        icon: mdiCogOutline,
        label: "Configuraciones",
      },
      {       
        icon: mdiAccountBox,
        label: "Mis cursos",
      },
      {
        isDivider: true,
      },
      {
        icon: mdiLogout,
        label: "Cerrar sesión",
        isLogout: true,
      },
    ],
  },
  {
    icon: mdiThemeLightDark,
    label: "Light/Dark",
    isDesktopNoLabel: true,
    isToggleLightDark: true,
  },
  {
    icon: mdiLogout,
    label: "Log out",
    isDesktopNoLabel: true,
    isLogout: true,
  },
];
