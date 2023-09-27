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
        icon: mdiAccountBox,
        label: "Mis cursos",
        to: "/courses",
      },
      {
        isDivider: true,
      },
      {
        icon: mdiLogout,
        label: "Cerrar sesión",
        to:"/",
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
    to:"/",
    isDesktopNoLabel: true,
    isLogout: true,
  },
];
